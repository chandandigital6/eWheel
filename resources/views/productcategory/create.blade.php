@extends('layouts.aap')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ isset($productCategory) ? 'Edit Product Category' : 'Create Product Category' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($productCategory) ? route('productCategory.update', $productCategory->id) : route('productCategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @if(isset($productCategory))
                    @method('PUT')
                @endif --}}

                <div class="mb-4">
                    <label for="category_name" class="form-label">Category Name <span class="text-danger">*</span></label>
                    <input type="text" id="category_name" name="category_name" class="form-control @error('category_name') is-invalid @enderror"
                           value="{{ old('category_name', $productCategory->category_name ?? '') }}" placeholder="Enter category name" required>
                    @error('category_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                    @if(isset($productCategory) && $productCategory->image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$productCategory->image) }}" alt="Category Image" class="img-thumbnail" style="width: 150px;">
                        </div>
                    @endif
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas {{ isset($productCategory) ? 'fa-edit' : 'fa-plus' }}"></i>
                        {{ isset($productCategory) ? 'Update' : 'Create' }}
                    </button>
                    <a href="{{ route('productCategory.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
