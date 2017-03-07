@extends('layouts.master')

@section('content')

  <h1>{{ $post->title }}</h1>

  <p>
  	{{ $post->body }}
  </p>

<div class="comments">
  @foreach ($post->comments as $comment)
  <article>
    <strong>
      {{ $comment->created_at->diffForHumans() }}: &nbsp;
    </strong>
    {{ $comment->body }}
  </article>
</div>
@endforeach

@endsection
