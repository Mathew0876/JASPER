@extends('layouts/app')

@section ('content')
<h1 class="text-gray-700 text-3xl pt-5 font-medium mb-4 mt-2">Add Document</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">

    <form method="POST" action="/documents/add">
        @csrf

        @if ($msg = Session::get('successAdd'))
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

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                    Title
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" name="title" type="text" placeholder="Title" value="@if(isset($requirement)){{$requirement->title}}@endif" required>
            </div>
        </div>

        <div class="mx-auto pt-5">
            <x-button style="text-transform: none;" class="mx-auto">
                {{ ('Add Document') }}
            </x-button>
        </div>
    </form>
</div>

<h1 class="text-gray-700 text-3xl pt-5 font-medium mb-4 mt-2">Delete Document</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">

    <form method="POST" action="/documents/delete">
        @csrf

        @if ($msg = Session::get('successDelete'))
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

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                    Title
                </label>
                <div class="relative">
                 <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="docId" name="docId">
                @foreach($docs as $doc)
                <option value='{{$doc->id}}'> {{ $doc->title }}</option>
                @endforeach
            </select>
                 </div>
            </div>
        </div>

        <div class="mx-auto pt-5">
            <x-button style="text-transform: none;" class="mx-auto">
                {{ ('Delete Document') }}
            </x-button>
        </div>
    </form>
</div>

@endsection