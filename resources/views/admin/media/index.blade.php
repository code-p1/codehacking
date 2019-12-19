@extends('layouts.index')

@section('content')

<h1>Media</h1>
@if ($photos)
<table class="table">
    <thead>
        <tr>
            <th>
            <td>File</td>
            <td>Created</td>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($photos as $photo)
        <tr>
            <th>
            <td><img height="50" src="{{ $photo->file }}" alt=""></td>
            <td>{{ $photo->created_at ? $photo->created_at : 'no date' }}</td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}
            </td>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection