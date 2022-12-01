
@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{ $title }}</h1>

<div class="card mb-3">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>

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
