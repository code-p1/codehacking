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
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th></th>
                                <th></th>
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
                                <td>{!! str_limit($post->body, 30) !!}</td>
                                <td><a href="{{ route('home.post', $post->slug) }}" target="_blank">View Post</a></td>
                                <td><a href="{{ route('comments.show',$post->id) }}">View Comments</a></td>
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

@section('script')

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "pageLength": 5,
        "lengthMenu": [[1, 5, 10, 100], [1, 5, 10, 100]]
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection