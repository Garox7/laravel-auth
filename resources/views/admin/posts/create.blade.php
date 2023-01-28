@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.posts.store') }}" class="needs-validation" method="post" novalidate>
        @csrf()

        {{-- TITLE  --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            <div class="invalid-feedback">
                @error('title')
                    <ul>
                        @foreach ($errors->get('title') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- SLUG  --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
            <div class="invalid-feedback">
                @error('slug')
                    <ul>
                        @foreach ($errors->get('slug') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- URL IMAGE  --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
            <div class="invalid-feedback">
                @error('image')
                    <ul>
                        @foreach ($errors->get('image') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- CONTENUTO POST --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">Inserisci l'anteprima del post</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
            <div class="invalid-feedback">
                @error('excerpt')
                    <ul>
                        @foreach ($errors->get('excerpt') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        {{-- ANTEPRIMA TESTO --}}
        <div class="mb-3">
            <label for="content" class="form-label">Inserisci il contenuto del post</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
            <div class="invalid-feedback">
                @error('content')
                    <ul>
                        @foreach ($errors->get('content') as $errorMess)
                            <li>{{ $errorMess }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Crea post</button>
        </div>
    </form>
@endsection
