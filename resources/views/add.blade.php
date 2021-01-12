@extends('layouts/app')

@section ('content')


<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
    <form method="POST" action="{{route('requirementModelController.store')}}">
        @csrf
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                    Title
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" name="title" type="text" placeholder="Title" required>
            </div>
            <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="priority">
                    Priority
                </label>
                <div class="relative">
                    <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="priority" name="priority">
                        <option value='1'>Low</option>
                        <option value='2'>Medium</option>
                        <option value='3'>High</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" 
                    id="description" placeholder="Description" name="description"> </textarea>
            </div>
        </div>
        <div class="-mx-3 md:flex mb-2">
            
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="assign">
                    Assign to
                </label>
                <div class="relative">
                    <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="assign" name="assign">
                        <option value='{{Auth::user()->id}}'> {{ Auth::user()->name }}</option>
                        @foreach($users as $user)
                            <option value='{{$user->id}}'> {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
        </div>

        <div class="mx-auto pt-5">
            <x-button style="text-transform: none;" class="mx-auto">
                {{ ('Add Requirement') }}
            </x-button>
        </div>


    </form>
</div>

@endsection