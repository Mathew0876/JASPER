@extends('layouts/app')

@section('content')
<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Dashboard</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full h-96">
    <h2 class="text-2xl font-medium">My Requirements</h2>
    <div class="overflow-auto">
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
                <tr>
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
                            {{ $requirement->ciaaa_category }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">
                            {{ App\Models\User::find($requirement->assigned_to)->name ?? null }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="flex gap-x-3">
    <div class="flex-1 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
        <h2 class="text-2xl font-medium">Users</h2>
        <div class="overflow-auto">
            <table class="min-w-full">
                <thread>
                    <tr>
                        <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Name</th>
                    </tr>
                </thread>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex-1 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full">
        Insert Overall Progress Here
    </div>
</div>

@endsection