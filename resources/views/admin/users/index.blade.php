@extends('layouts.index')

@section('content')
<h1>This is index User</h1>

{{-- {!! Form::submit('Create Post', ['class'=>'form-group']) !!} --}}

<a href="{{route('users.create')}}">Create</a>
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
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active?</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users)
                        @foreach ($users as $user)
                        <tr>
                                {{-- {{$user->photo ? $user->photo->file : 'No user photo'}} --}}
                            <td><img height="50" width="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
                            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->is_active ? 'Active' : 'Not Active'}}</td>
                            @if ($user->created_at && $user->updated_at)
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>{{$user->updated_at->diffForHumans()}}</td>
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