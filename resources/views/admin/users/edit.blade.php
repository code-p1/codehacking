@extends('layouts.index')

@section('content')

@include('includes.form_error')


<h1>Edit User</h1>
<div class="row">
    <div class="col-sm-3">
        <img height="200" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/200x200'}}" alt=""
            class="img-responsive img-rounded">

    </div>
    <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],
        'files'=>true])
        !!}

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
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status: ') !!}
            {!! Form::select('is_active', array(0 => 'Not Active', 1 => 'Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo: ') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password: ') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id], 'class' =>
        'pull-right']) !!}

        <div class="form-group">
            {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection