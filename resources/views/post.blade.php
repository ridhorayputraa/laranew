@extends('layouts.main')

@section('container')
<article class="mt-5">
    <h2>{{ $post->title }}</h2>
    <p>By Ridho ray in <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name }}</a></p>

{!! $post->body !!}


</article>

<a href="/blog">Back to post</a>
@endsection
