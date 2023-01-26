@extends('admin.layouts.base-admin')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->image }}" alt="" class="figure-img img-fluid rounded mb-4">
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection
