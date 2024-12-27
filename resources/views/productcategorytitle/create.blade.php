@extends('layouts.aap')

@section('content')


    <div class="container mt-5">



    <h1>{{ isset($title) ? 'Edit Product Category Title' : 'Create Product Category Title' }}</h1>
    <form action="{{ isset($title) ? route('productCategoryTitle.update', $productCategoryTitle->id) : route('productCategoryTitle.store') }}" method="POST">
        @csrf
        {{-- @if(isset($title))
            @method('PUT')
        @endif --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $productCategoryTitle->title ?? '') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sub_title" class="form-label">Subtitle</label>
            <input type="text" id="sub_title" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror"
                   value="{{ old('sub_title', $productCategoryTitle->sub_title ?? '') }}">
            @error('sub_title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            {{ isset($productCategoryTitle) ? 'Update' : 'Create' }}
        </button>
    </form>
</div>




@endsection
