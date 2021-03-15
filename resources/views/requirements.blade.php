@extends('layouts/app')

@section('content')

<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Requirements</h1>
@if ($msg = Session::get('successEdit'))
        <div class="alert alert-success">
            <strong>{{ $msg }}</strong>
        </div>
@endif
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

@endsection