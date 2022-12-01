
@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{ $title }}</h1>

{{-- cek postingannya ada ga --}}
{{-- dipakai ketika fitur pencarian --}}
@if ($posts->count())
{{-- hitung jumlah dari postingannya --}}
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
    <div class="card-body text-center">
      <h5 class="card-title"><a class="text-decoration-none text-dark" href="/post/{{ $posts[0]->slug}}">{{ $posts[0]->title }}</a> </h5>
      <p>
        <small class="text-muted"> By. <a href="/author/{{ $posts[0]->author->username }}" class="text-decoration-none">
        {{ $posts[0]->author->name   }}</a> in <a class="text-decoration-none" href="/categories/{{ $posts[0]->category->slug }}">
             {{ $posts[0]->category->name }}</a>{{ $posts[0]->created_at->diffForHumans() }}
        </small>
            </p>

      <p class="card-text">{{ $posts[0]->excerpt }}</p>

      <a class="text-decoration-none btn btn-primary" href="/post/{{ $posts[0]->slug}}">Read More</a>

    </div>
  </div>
@else
<p class="text- fs-4">Not Post Found.</p>


@endif


@foreach ($posts->skip(1) as $p)
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
