@extends('layouts.master')

@section('content')

  <h1>{{ $post->title }}</h1>

  @if (count($post->tags))
    <ul>
      @foreach ($post->tags as $tag)
        <li>
          <a href="/posts/tags/{{ $tag->name }}">
          {{ $tag->name }}
        </li>
          </a>
      @endforeach
    </ul>
  @endif

  <p>
  	{{ $post->body }}
  </p>

<div class="comments">
  <ul>
  @foreach ($post->comments as $comment)
  <li>
    <strong>
      {{ $comment->created_at->diffForHumans() }}: &nbsp;
    </strong>
    {{ $comment->body }}
  </li>
  @endforeach
  </ul>
</div>
{{-- Add a comment --}}
<div class="card">
  <div class="card-block">
    <!-- We are creating a comment, the method should be POST. -->
    <form method="POST" action="/posts/{{ $post->id }}/comments">
      {{ csrf_field() }}
      <div class="form-group">
        <textarea name="body" placeholder="Comment on this post" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Comment</button>
      </div>
    </form>
    @include('layouts.errors')
  </div>
</div>


@endsection
