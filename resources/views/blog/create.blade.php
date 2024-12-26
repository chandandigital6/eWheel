@extends('layouts.aap')
@section('content')

    <div class="container mt-5">
        <h1>Create a New Blog</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
                <label for="short_description">Short Description</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value="{{ old('short_description') }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control textarea" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="categories">Categories</label>
                <input type="text" class="form-control" id="categories" name="categories" value="{{ old('categories') }}">
            </div>
            <div class="form-group">
                <label for="author_name">Author Name</label>
                <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
