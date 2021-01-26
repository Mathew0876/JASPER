
@extends('layouts/app')

@section('content')

<h1 class="text-gray-700 text-3xl font-medium mb-4 mt-2">Import Threat Model</h1>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <form action="{{route('importController.uploadFile')}}" method="post" enctype="multipart/form-data">
        @csrf 
        @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $msg }}</strong>
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="custom-file m-4 justify-left">
            <input type="file" name="file" class="custom-file-input font-semibold font-sans-roboto text-s" id="chooseFile">
            <x-label class="custom-file-label text-gray-400 mb-2" for="chooseFile">
                {{ __('Select threat model to upload.') }}
            </x-label>
            <x-button>
            {{ __('Upload file') }}
            </x-button>
        </div>


    </form>
</div>

@endsection
