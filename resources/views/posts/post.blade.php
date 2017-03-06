<div class="blog-post">
  <h2 class="blog-post-title">
	  <a href="/posts/{{ $post->id }}">
	  	{{ $post->title }}
	  </a>
  </h2>
  <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
  <!-- Time stamps here are instances of a library called carbon -->
  {{ $post->body }}
</div><!-- /.blog-post -->
