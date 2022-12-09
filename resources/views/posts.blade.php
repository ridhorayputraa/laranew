
@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>


<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
          @if (request('category'))
             <input type="hidden" name="category" value="{{ request('category') }}">
          @endif

          @if (request('author'))
             <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
        {{-- Tambahkan input disini --}}
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search"
            value="{{ request('search') }}" >
            <button class="btn btn-danger" type="submit" >Search</button>
          </div>
        </form>
    </div>
</div>


{{-- cek postingannya ada ga --}}
{{-- dipakai ketika fitur pencarian --}}
@if ($posts->count())
{{-- hitung jumlah dari postingannya --}}
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
    <div class="card-body text-center">
      <h5 class="card-title"><a class="text-decoration-none text-dark" href="/post/{{ $posts[0]->slug}}">{{ $posts[0]->title }}</a> </h5>

      <p>
        <small class="text-muted"> By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">
        {{ $posts[0]->author->name   }}</a> in <a class="text-decoration-none" href="/posts?category={{ $posts[0]->category->slug }}">
             {{ $posts[0]->category->name }}</a>{{ $posts[0]->created_at->diffForHumans() }}
        </small>
            </p>

      <p class="card-text">{{ $posts[0]->excerpt }}</p>

      <a class="text-decoration-none btn btn-primary" href="/post/{{ $posts[0]->slug}}">Read More</a>

    </div>
  </div>


{{-- Membuat sebuah card  --}}
<div class="container">
    <div class="row">

        @foreach ($posts->skip(1) as $p )


        <div class="col-md-4 mb-3">
            <div class="card" >
              {{-- Label category --}}
              <div
               class="position-absolute px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7) "><a
               class="text-white text-decoration-none" href="/posts?category={{ $p->category->slug}}">{{ $p->category->name }}</a>
              </div>
                <img src="https://source.unsplash.com/500x400?{{ $p->category->name }}" class="card-img-top" alt="{{ $p->category->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{$p->title }}</h5>
                  <p>
                    <small class="text-muted"> By. <a href="/posts?author={{ $p->author->username }}" class="text-decoration-none">
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

{{-- Kalo Postingannya ga ketemu --}}
@else
<p class="text-center fs-4">Not Post Found.</p>


@endif

@endsection
