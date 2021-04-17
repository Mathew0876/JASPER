@extends('layouts/app')

@section('content')
<div class="flex">
    <h1 class="flex-1 text-gray-700 text-3xl font-medium mb-4 mt-2">Requirement ID - {{$viewRequirement->id}}</h1>
    <div class="flex-none mb-4 mt-2">
        <x-button class="mx- object-left" style="text-transform: none;">
            <a href="/add/{{$viewRequirement->id}}">
                {{ __('Edit Requirement') }}
            </a>
        </x-button>
        <x-button class="mx- object-left mt-3" style="text-transform: none;">
            <a href="/delete/{{$viewRequirement->id}}">
                {{ __('Delete Requirement') }}
            </a>
        </x-button>
    </div>
</div>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
    <div>
        <h2 class="text-gray-700 text-xl font-bold mb-4 mt-2">{{ $viewRequirement->title }}</h2>
    </div>
    <div class="flex mx-4 my-2">
        <h2 class="flex-none text-gray-600 text-l font-medium p-2">Assigned to</h2>
        <div class="flex-1 p-2">
            {{ App\Models\User::find($viewRequirement->assigned_to)->name ?? null }}
        </div>
    </div>
    <div class="flex mx-4 my-2">
        <div class="flex flex-1 mr-2">
            <h2 class="flex-none text-gray-600 text-l font-medium p-2">Stride Category</h2>
            <div class="flex-1 p-2">
                {{ $viewRequirement->ciaaa_category }}
            </div>
        </div>
        <div class="flex flex-1 ml-2">
            <h2 class="flex-none text-gray-600 text-l font-medium p-2">Status</h2>
            <div class="flex-1 p-2">
                {{ $viewRequirement->state }}
            </div>
        </div>
    </div>
    <div class="flex mx-4 my-2">
        <h2 class="flex-none text-gray-600 text-l font-medium p-2">Word Match</h2>
        <div class="flex-1 p-2">
            {{ $viewRequirement->word_match }}
        </div>
    </div>
    <div class="mx-4 my-2">
        <h2 class="text-gray-600 text-l font-medium p-2">Mitigation Strategy</h2>
        <div class="p-2 m-4">
            {{ $viewRequirement->mitigations ?? null }}
        </div>
    </div>
    <div class="mx-4 my-2">
        <h2 class="text-gray-600 text-l font-medium p-2">Description</h2>
        <div class="p-2 m-4">
            {{ $viewRequirement->description }}
        </div>
    </div>

</div>

@endsection