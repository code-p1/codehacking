@extends('layouts.index')

@section('content')
<h1>Reply</h1>

@if (count($replies)>0)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Replies</h3>

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
                        @foreach ($replies as $reply)
                        <tr>
                            <td>{{ $reply->author }}</td>
                            <td>{{ $reply->email }}</td>
                            <td>{{ $reply->body }}</td>
                            </td>
                            @if ($reply->created_at)
                            <td>{{$reply->created_at->diffForHumans()}}</td>
                            @else
                            <td>-</td>
                            @endif
                            <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
                            <td>
                                @if ($reply->is_active==1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('Unapprove', ['class'=>'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                                @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}

                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                                </div>
                                {!! Form::close() !!}
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}

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
<h1 class="text-center">No Reply</h1>
@endif
@endsection