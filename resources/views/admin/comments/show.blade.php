@extends('layouts.index')

@section('content')
<h1>Comment</h1>

@if (count($comments)>0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Comment</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                            <th>Author</th>
                            <th>Email</th>
                            <th>Body</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->author }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->body }}</td>
                            </td>
                            @if ($comment->created_at)
                            <td>{{$comment->created_at->diffForHumans()}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                            <td>
                                @if ($comment->is_active==1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('Unapprove', ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                                @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}

                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                                </div>
                                {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@else
<h1 class="text-center">No Comment</h1>
@endif
@endsection