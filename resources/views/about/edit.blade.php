@extends('layouts.aap')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Update About Data</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Error Alerts -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Start -->
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @if ($about->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @else
                                <p class="text-muted mt-2">No image available</p>
                            @endif
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Title Input -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $about->title }}" placeholder="Enter title" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Heading Input -->
                        <div class="mb-4">
                            <label for="heading" class="form-label fw-bold">Heading</label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ $about->heading }}" placeholder="Enter heading" required>
                            @error('heading')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Description Input -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control textarea @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Write some details here..." style="resize: none;">{{ $about->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">Update</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
