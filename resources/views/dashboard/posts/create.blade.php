@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  {{-- form --}}
  <div class="col-lg-8">

      <form method="post" action="/dashboard/posts">
        @csrf
        {{-- akan langung ke method source --}}
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="title">

        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control" disabled readonly id="slug">

        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>

          <select class="form-select" name="category_id">
               @foreach ($categories as $category )
               <option value="{{ $category->id }}">{{ $category->name }}</option>

               @endforeach
          </select>
        </div>


        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>

  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })
    console.log(title.value)
    </script>

@endsection
