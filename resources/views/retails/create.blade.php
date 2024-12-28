@extends('layouts.aap')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ isset($retails) ? 'Edit Retail' : 'Create Retail' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ isset($retails) ? route('retails.update', $retails->id) : route('retails.store') }}" method="POST">
                @csrf
                {{-- @if(isset($retail))
                    @method('PUT')
                @endif --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $retails->title ?? '') }}" placeholder="Enter the title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sub_title" class="form-label">Sub Title</label>
                    <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" value="{{ old('sub_title', $retails->sub_title ?? '') }}" placeholder="Enter the sub title">
                    @error('sub_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="website_url" class="form-label">Website URL</label>
                    <input type="url" class="form-control @error('website_url') is-invalid @enderror" id="website_url" name="website_url" value="{{ old('website_url', $retails->website_url ?? '') }}" placeholder="https://example.com">
                    @error('website_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ isset($retails) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('retails.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
