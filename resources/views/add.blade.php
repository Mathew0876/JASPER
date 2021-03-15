@extends('layouts/app')

@section ('content')


<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
    @if(isset($requirement))
        <form method="POST" action="/add/{requirement->id}">
        <input type="hidden" id="id" name="id" value="{{$requirement->id}}">
    @else
        <form method="POST" action="{{route('requirementModelController.store')}}">
     @endif
            @csrf
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="title">
                        Title
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="title" name="title" type="text" placeholder="Title" value="@if(isset($requirement)){{$requirement->title}}@endif" required>
                </div>
                <div class="md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="priority">
                        Priority
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="priority" name="priority">
                            <option value='Low' @if(isset($requirement) && $requirement->priority == "Low") selected @endif>Low</option>
                            <option value='Medium' @if(isset($requirement) && $requirement->priority == "Medium") selected @endif>Medium</option>
                            <option value='High' @if(isset($requirement) && $requirement->priority == "High") selected @endif>High</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="md:w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3" id="description" placeholder="Description" name="description">@if(isset($requirement)){{$requirement->description}}@endif</textarea>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-2">

                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="assign">
                        Cybersecurity Category
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="ciaaa_category" name="ciaaa_category">
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Confidentiality") selected @endif>Confidentiality</option>
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Integrity") selected @endif>Integrity</option>
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Authenticity") selected @endif>Authenticity</option>
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Availability") selected @endif>Availability</option>
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Accountability") selected @endif>Accountability</option>
                            <option @if(isset($requirement) && $requirement->ciaaa_category == "Non-Repudiation")
                            selected @endif>Non-Repudiation</option>
                        </select>
                    </div>
                </div>

                <div class="md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="assign">
                        Assign to
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="assigned_to" name="assigned_to">
                            <option value='{{Auth::user()->id}}'> {{ Auth::user()->name }}</option>
                            @foreach($users as $user)
                            <option value='{{$user->id}}' @if(isset($requirement) && $requirement->assigned_to == $user->id) selected @endif> {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="mx-auto pt-5">
                <x-button style="text-transform: none;" class="mx-auto">
                    @if(isset($requirement))
                        {{ ('Update Requirement') }}
                    @else
                        {{ ('Add Requirement') }}
                    @endif
                </x-button>
            </div>


        </form>
</div>

@endsection