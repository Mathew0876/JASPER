@extends('layouts/app')

@section ('content')

<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Add Traceability Link</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">

    <form method="POST" action="{{route('documentsController.addLink')}}">
        @csrf
        @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $msg }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="doc">
            Documents
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="docId" name="docId">
                @foreach($docs as $doc)
                <option value='{{$doc->id}}'> {{ $doc->title }}</option>
                @endforeach
            </select>
        </div>

        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2 pt-3" for="req">
            Requirements
        </label>
        <div class="relative">
            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="reqId" name="reqId">
                @foreach($reqs as $req)
                <option value='{{$req->id}}'> {{ $req->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <span class="text-gray-700">Type</span>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" checked class="form-radio" name="linkType" value="Forward">
                    <span class="ml-2">Forward</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" class="form-radio" name="linkType" value="Backward">
                    <span class="ml-2">Backward</span>
                </label>
            </div>
        </div>


        <div class="mx-auto pt-5">
            <x-button style="text-transform: none;" class="mx-auto">
                {{ ('Add Link') }}
            </x-button>
        </div>
    </form>

</div>


<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Traceability Table</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <table class="min-w-full">
            <thread>
                <tr>
                    <x-th> {{ __('Title') }} </x-th>
                    <x-th> {{ __('Forward Links') }} </x-th>
                    <x-th> {{ __('Backward Links') }} </x-th>
                </tr>
            </thread>
            <tbody>
                @foreach($docs as $doc)
                <tr class="hover:bg-gray-200">
                    <x-table-col>
                        {{ $doc->title }}
                    </x-table-col>
                    <x-table-col>
                        @foreach( $doc->requirementModel()->where('backwards', false)->get() as $req)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800">
                            {{ $req->title }}
                        </span>
                        @endforeach
                    </x-table-col>
                    <x-table-col>
                        @foreach( $doc->requirementModel()->where('backwards', true)->get() as $req)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800">
                            {{ $req->title }}
                        </span>

                        @endforeach
                    </x-table-col>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection