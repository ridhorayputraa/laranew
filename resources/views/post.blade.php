@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $post->title }}</h1>
    <p> <a class="text-decoration-none" href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }}</a></p>

{!! $post->body !!}




<a href="/blog" class="d-block mt-3">Back to post</a>
@endsection
