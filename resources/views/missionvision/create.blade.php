@extends('layouts.aap')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h3>{{ isset($missionVision) ? 'Update Title' : 'Create ProductTitle' }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ isset($missionVision) ? route('missionVision.update', $missionVision->id) : route('missionVision.store') }}" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $missionVision->title ?? '') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title" name="sub_title" value="{{ old('sub_title', $missionVision->sub_title ?? '') }}">
                            @error('sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="vision" class="form-label">Vision</label>
                            <input type="text" class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" value="{{ old('vision', $missionVision->vision ?? '') }}">
                            @error('vision')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
{{--
                        <div class="mb-3">
                            <label for="vision_description" class="form-label">Vision Description</label>
                            <textarea class="form-control @error('vision_description') is-invalid @enderror" id="vision_description" name="vision_description" rows="4">{{ old('vision_description', $missionVision->vision_description ?? '') }}</textarea>
                            @error('vision_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
{{--
                        <div class="mb-3">
                            <label for="mission" class="form-label">Mission</label>
                            <input type="text" class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission" value="{{ old('mission', $missionVision->mission ?? '') }}">
                            @error('mission')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
{{--
                        <div class="mb-3">
                            <label for="mission_description" class="form-label">Mission Description</label>
                            <textarea class="form-control @error('mission_description') is-invalid @enderror" id="mission_description" name="mission_description" rows="4">{{ old('mission_description', $missionVision->mission_description ?? '') }}</textarea>
                            @error('mission_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                        </div>

                        <button type="submit" class="btn btn-success w-100">{{ isset($missionVision) ? 'Update' : 'Create' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
