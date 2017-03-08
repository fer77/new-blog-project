@extends('layouts.master')

@section('content')

  <h1>{{ $post->title }}</h1>

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
    <form method="POST" action="/posts/{{ $post->id }}/comments">
      {{ csrf_field() }}
      <div class="form-group">
        <textarea name="body" placeholder="Add your comment here" class="form-control" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Comment</button>
      </div>
    </form>
    @include('layouts.errors')
  </div>
</div>


@endsection
