@extends('layouts.index')

@section('styles')
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css') }}">
@endsection

@section('content')

<h1>Upload Media</h1>

{!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

{!! Form::close() !!}  

@endsection

@section('script')
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js') }}"></script>
@endsection