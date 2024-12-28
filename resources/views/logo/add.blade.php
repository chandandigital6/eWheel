@extends('layouts.aap')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Add New Logo</h3>
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
                    <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">

\                        @csrf

                        <!-- Header Logo Upload -->
                        <div class="mb-4">
                            <label for="header_logo" class="form-label fw-bold">Header Logo</label>
                            <input type="file" class="form-control @error('header_logo') is-invalid @enderror" id="header_logo" name="header_logo">
                            @if(isset($header_logo))
                                <div class="mt-2">
                                    <img src="{{ $header_logo }}" alt="Header Logo" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @else
                                <p class="text-muted mt-2">No image available</p>
                            @endif
                            @error('header_logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Footer Logo Upload -->
                        <div class="mb-4">
                            <label for="footer_logo" class="form-label fw-bold">Footer Logo</label>
                            <input type="file" class="form-control @error('footer_logo') is-invalid @enderror" id="footer_logo" name="footer_logo">
                            @if(isset($footer_logo))
                                <div class="mt-2">
                                    <img src="{{ $footer_logo }}" alt="Footer Logo" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @else
                                <p class="text-muted mt-2">No image available</p>
                            @endif
                            @error('footer_logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Logo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
