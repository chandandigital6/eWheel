@extends('layouts.aap')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Update Feature</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Update Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            <div class="mt-3">
                                @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Testimonial Image" class="rounded shadow-sm" width="200">
                                @else
                                    <p class="text-muted">No image available</p>
                                @endif
                            </div>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Message Input -->
                        <div class="mb-4">
                            <label for="msg" class="form-label fw-bold">Message</label>
                            <textarea class="form-control textarea @error('msg') is-invalid @enderror" id="msg" name="msg" rows="4" placeholder="Write your FeatureMessage">{{ $testimonial->msg }}</textarea>
                            @error('msg')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">Your FeatureTitle</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $testimonial->name }}" placeholder="Enter FeatureTitle">
                            @error('name')
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
