
@extends('layouts.main')

@section('container')
<h1 class="mb-5">Post Category : {{ $categories[0]->name }}</h1>

@foreach ($categories as $category)
<ul>
    <li>
        <h1> <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h1>
    </li>
</ul>
@endforeach

@endsection
