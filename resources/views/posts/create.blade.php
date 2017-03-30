@extends('layouts.master')

@section('content')

	<h1>Create a New Post</h1>
	<form method="POST" action="/posts">
	<!-- This will return a hidden input (see laravel docs) -->
	{{ csrf_field() }}

	@include('layouts.errors')

	  <div class="form-group">
	    <label for="title">Title</label>
	    				<!-- If we want to submit to a server we need to add a name prop to the <input> tag -->
	    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
	  </div>

	  <!-- Add form validation in PostsController.php -->

	  <div class="form-group">
	    <label for="body">Body</label>
	    <textarea class="form-control" id="body" placeholder="Start Typing" name="body"></textarea>
	  </div>

	  <div class="form-group">
	  	<button type="submit" class="btn btn-primary">Publish</button>
	  </div>
	</form>

@endsection