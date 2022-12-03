
@extends('layouts.main')

@section('container')
<h1 class="mb-5">Post Category : {{ $categories[0]->name }}</h1>


<div class="container">
    <div class="row">
        @foreach ($categories as $category)

        <div class="col-md-4">
            <div class="card text-bg-dark">
                <img src="https://source.unsplash.com/500x400?{{ $category->name }}"  class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay">
                  <h5 class="card-title">{{ $category->name }}</h5>
                </div>
              </div>
        </div>

        @endforeach

    </div>
</div>




@endsection
