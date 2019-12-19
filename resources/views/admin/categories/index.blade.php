@extends('layouts.index')

@section('content')
<h1>Category</h1>

<div class="row">
    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category: ') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 450px;">
                        <table class="table table-head-fixed">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories)
                                @foreach ($categories as $category)
                                <tr>
                                    <td><a href="{{ route('categories.edit',$category->id) }}">{{ $category->name }}</a>
                                    </td>
                                    @if ($category->created_at && $category->updated_at)
                                    <td>{{$category->created_at->diffForHumans()}}</td>
                                    @else
                                    <td>-</td>
                                    <td>-</td>
                                    @endif

                                </tr>
                                @endforeach
                                @else
                                User not Found
                                @endif


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</div>
    @endsection