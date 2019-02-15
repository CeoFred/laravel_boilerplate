@extends('layout')


@section('content')
   
<div class="blog-post">
          @foreach($posts as $post)
          @include('partials.posts')
          @endforeach
          </div><!-- /.blog-post -->


@endsection

