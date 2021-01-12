@extends('layouts/app')

@section('content')

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<table class="min-w-full">
    <thread>
        <tr>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Req. #</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Title</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Priority</th>
          <th class="px-6 py-3 border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 tracking-wider">Status</th>
        </tr>
    </thread>
    <tbody>
    </tbody>
</table>

</div>

@endsection