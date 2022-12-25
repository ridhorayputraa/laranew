
@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row  my-3">
        <div class="col-md-8">



    <h1 class="mb-3">{{ $post->title }}</h1>

<a href="/dashboard/posts" class="btn btn-success"  ><span data-feather="arrow-left"></span> Back to all my posts</a>

<a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"  ><span data-feather="edit"></span>Edit</a>

<form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
    @method('delete')
@csrf
<button  class="btn btn-danger" onclick="return confirm('Are you sure?')" >Delete<span data-feather='x-circle' ></span></button>
</form>

    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

    <article class="my- fs-6">
        {!! $post->body !!}
    </article>



        </div>
    </div>
</div>
@endsection
