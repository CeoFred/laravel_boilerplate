  <h2 class="blog-post-title">
  <a href="/posts/{{$post->id}}">
  {{$post->title}}
  
  </a></h2>
            <p class="blog-post-meta">{{$post->user->name}} on  {{$post->created_at->toFormattedDateString()}}<a href="#"></a></p>
          
            <p>{{ $post->body }}</p>
            