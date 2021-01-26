@extends('layouts/app')

@section('content')

<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Requirements</h1>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<table class="min-w-full">
    <thread>
        <tr>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Req. #</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Title</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Priority</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Status</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Category</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Assigned To</th>
        </tr>
    </thread>
    <tbody>
    @foreach($requirements as $requirement)
    <tr onclick="document.location = 'view-requirement/{{ $requirement->id }}'">
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ $requirement->id }}
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ $requirement->title }}
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ $requirement->priority }}
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ $requirement->state }}
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ $requirement->CIAAA_category }}
            </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
                {{ App\Models\User::find($requirement->assigned_to)->name }}
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection