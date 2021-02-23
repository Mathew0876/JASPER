@extends('layouts/app')

@section('content')

<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Dashboard</h1>
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-full h-96">
    <h2 class="text-2xl font-medium pb-4"> {{ Auth::user()->name }} 's Requirements</h2>
    <div class="overflow-auto p-2">
        <table class="min-w-full">
            <thread>
                <tr>
                    <x-th> {{ __('Req. ID') }}      </x-th>
                    <x-th> {{ __('Title') }}        </x-th>
                    <x-th> {{ __('Priority') }}     </x-th>
                    <x-th> {{ __('Status') }}       </x-th>
                    <x-th> {{ __('Category') }}     </x-th>
                    <x-th> {{ __('Assigned To') }}  </x-th>
                </tr>
            </thread>
            <tbody>
            @foreach($requirements as $requirement)
            <tr class="hover:bg-gray-200" 
                onclick="document.location = 'view-requirement/{{ $requirement->id }}'">
                <x-table-col> {{ $requirement->id }}                </x-table-col>
                <x-table-col> {{ $requirement->title }}             </x-table-col>
                <x-table-col> {{ $requirement->priority }}          </x-table-col>
                <x-table-col> {{ $requirement->state }}             </x-table-col>
                <x-table-col> {{ $requirement->ciaaa_category }}    </x-table-col>
                <x-table-col>
                        {{ App\Models\User::find($requirement->assigned_to)->name ?? null }}
                </x-table-col>
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