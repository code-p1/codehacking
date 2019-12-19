@extends('layouts.index')

@section('content')
<h1>Edit Categories</h1>

@include('includes.form_error')



<div class="col-sm-6">

    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',
    $category->id]]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Category: ') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Category', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}

    <div class="form-group">
        {!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}
    </div>

    {!! Form::close() !!}
</div>



@endsection