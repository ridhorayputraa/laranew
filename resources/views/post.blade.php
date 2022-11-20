@extends('layouts.main')

@section('container')
<article class="mt-5">
    <h2>{{ $post->title }}</h2>

{!! $post->body !!}


</article>

<a href="/blog">Back to post</a>
@endsection
