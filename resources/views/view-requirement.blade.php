@extends('layouts/app')

@section('content')
<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">View Requirement</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
    <div class="flex">
        <h2 class="flex-1">
            Requirement ID: {{$viewRequirement->id}}

        <h2 class="flex-1">
            Status: {{$viewRequirement->state}}
        </h2>
    </div>
    <h2 class="flex-1">
            Title: {{$viewRequirement->title}}
        </h2>
    <div class="flex">
        <h2 class="flex-1">
            Assign to:
        </h2>
        <h2 class="flex-1">
            Stride Category: {{$viewRequirement->CIAAA_category}}
        </h2>
    </div>
    <div>
        Description
    </div>
    
</div>

@endsection