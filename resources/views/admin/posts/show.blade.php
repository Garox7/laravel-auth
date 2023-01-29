@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="img-fluid rounded">
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection
