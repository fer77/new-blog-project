@extends('layouts.master')


@section('blog-posts')

@foreach($posts as $post)

@include('posts.post')

@endforeach

@include('layouts.blog-pagination')

@endsection
