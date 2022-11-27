
@extends('layouts.main')

@section('container')
<h1 class="mb-5">Halaman Blog Posts</h1>

@foreach ($posts as $p)
<article class="mb-5 border-bottom pb-4">
    <h2>
        <a class="text-decoration-none" href="/post/{{ $p->slug}}">{{$p->title }}</a>
    </h2>

        {{-- <h5>By: {{ $post->author }}</h5> --}}
    <p>By. <a href="/author/{{ $p->author->username }}" class="text-decoration-none">
        {{ $p->author->name   }}</a> in <a class="text-decoration-none" href="/categories/{{ $p->category->slug }}"> {{ $p->category->name }}</a></p>

    <p>{{ $p->excerpt }}</p>

    <a class="text-decoration-none" href="/post/{{ $p->slug}}">Read More..</a>

</article>
@endforeach

@endsection
