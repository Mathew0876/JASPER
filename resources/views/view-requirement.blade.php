@extends('layouts/app')

@section('content')
<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">View Requirement</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
    <div class="flex">
        <h2 class="flex-1">
            Requirement ID: 
        </h2>
        <h2 class="flex-1">
            Title:
        </h2>
        <h2 class="flex-1">
            Status
        </h2>
    </div>
    <div class="flex">
        <h2 class="flex-1">
            Assign to:
        </h2>
        <h2 class="flex-1">
            Stride Category:
        </h2>
    </div>
    <div>
        Description
    </div>
    
</div>

@endsection