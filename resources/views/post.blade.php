@extends('layouts.main')

@section('container')
<article class="mt-5">
    <h2>{{ $post->title }}</h2>
    <p> <a class="text-decoration-none" href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }}</a></p>

{!! $post->body !!}


</article>

<a href="/blog" class="d-block mt-5">Back to post</a>
@endsection
