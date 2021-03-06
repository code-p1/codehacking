@extends('layouts.blog-post')

@section('content')
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>

    <hr>

    @if (Session::has('comment_message'))
    {{ session('comment_message') }}
    @endif
    <!-- Blog Comments -->


    @if (Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

        <input type="hidden" name="post_id" value={{ $post->id }}>

        <div class="form-group">
            {!! Form::label('body', 'Comment: ') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

    </div>
    @endif


    <hr>

    <!-- Posted Comments -->
    @if (count($comments)>0)
    <!-- Comment -->
    @foreach ($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            {{-- <img class="media-object" height="64"
                src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt=""> --}}
            <img class="media-object" height="64"
                src="{{ Auth::user()->gravatar }}" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->author }}
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </h4>
            {{ $comment->body }}
            
            @if (count($comment->replies)>0)
            <!-- Nested Comment -->
            @foreach ($comment->replies as $reply)

            @if ($reply->is_active == 1)

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" height="64"
                        src="{{$reply->photo ? $reply->photo : 'http://placehold.it/64x64'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $reply->author }}
                        <small>{{ $reply->created_at->diffForHumans() }}</small>
                    </h4>
                    {{ $reply->body }}
                </div>
                {{-- <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button> --}}

                <div class="comment-reply">
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                    <input type="hidden" name="comment_id" value={{ $comment->id }}>

                    <div class="form-group">
                        {!! Form::label('body', 'Reply: ') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- </div> --}}
            </div>
            <!-- End Nested Comment -->
            @endif
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    @endif


</div>
@endsection

{{-- @section('script')
<script>
    $.("comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@endsection --}}