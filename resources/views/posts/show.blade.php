@extends('layout')

@section('content')

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at}} <a href="#"> </a></p>
            <p>{{$post->body}}</p>
            <div>

              <h3>Comments</h3>
@foreach ($post->comments as $comment)
<article>
{{$comment->body}}
</article>

@endforeach
</div>

            </div>
@endsection