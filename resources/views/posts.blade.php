
@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{ $title }}</h1>

{{-- cek postingannya ada ga --}}
{{-- dipakai ketika fitur pencarian --}}
@if ($posts->count())
{{-- hitung jumlah dari postingannya --}}
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
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

{{-- Membuat sebuah card  --}}
<div class="container">
    <div class="row">

        @foreach ($posts->skip(1) as $p )


        <div class="col-md-4 mb-3">
            <div class="card" >
                <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="{{ $p->category->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{$p->title }}</h5>
                  <p>
                    <small class="text-muted"> By. <a href="/author/{{ $p->author->username }}" class="text-decoration-none">
                    {{ $p->author->name   }}</a>{{ $p->created_at->diffForHumans() }}
                    </small>
                        </p>
                  <p class="card-text">{{ $p->excerpt }}</p>
                  <a href="/post/{{ $p->slug}}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
