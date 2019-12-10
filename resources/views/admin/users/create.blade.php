@extends('layouts.index')

@section('content')
this is crete view

@include('includes.form_error')

{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

<div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'E-mail: ') !!}
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role_id', 'Role: ') !!}
    {!! Form::select('role_id', ['' => 'Choose'] + $roles, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('is_active', 'Status: ') !!}
    {!! Form::select('is_active', array(0 => 'Not Active', 1 => 'Active'), null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Photo: ') !!}
    {!! Form::file('file', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password: ') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}


@endsection