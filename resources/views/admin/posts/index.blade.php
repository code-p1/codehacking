@extends('layouts.index')

@section('content')
    <h1>Posts</h1>

    @if (Session::has('deleted_post'))
        <p class="alert alert-danger">{{ session('deleted_post') }}</p>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User</h3>
    
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
                                <th>User</th>
                                <th>Category</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Body?</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts)
                            @foreach ($posts as $post)
                            <tr>
                                    {{-- {{$user->photo ? $user->photo->file : 'No user photo'}} --}}
                                {{-- <td><img height="50" width="50" src="{{ $user->photo?$user->photo->file:'http://placehold.it/50x50'"alt=""> }}</td>
                                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td> --}}
                                <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                                <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->user->name }}</a></td>
                                <td>{{ $post->category ? $post->category->name : 'Uncategories' }}</td>
                                <td>{{$post->title}}</td>
                                <td>{{ str_limit($post->body, 30) }}</td>
                                @if ($post->created_at && $post->updated_at)
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
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
@endsection