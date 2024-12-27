@extends('layouts.aap')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">{{ isset($contact) ? 'Update Contact' : 'Create Contact' }}</h3>
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
                    <form action="{{ isset($contact) ? route('contact.update', $contact->id) : route('contact.store') }}" method="POST">
                        @csrf

                        <!-- Contact Title -->
                        <div class="form-group">
                            <label for="con_title">Contact Title:</label>
                            <input type="text" name="con_title" id="con_title" class="form-control"
                                   value="{{ old('con_title', $contact->con_title ?? '') }}">
                        </div>

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title', $contact->title ?? '') }}">
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control"
                                   value="{{ old('address', $contact->address ?? '') }}">
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone', $contact->phone ?? '') }}">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old('email', $contact->email ?? '') }}">
                        </div>

                        <!-- Open Time -->
                        <div class="form-group">
                            <label for="open_time">Open Time:</label>
                            <input type="text" name="open_time" id="open_time" class="form-control"
                                   value="{{ old('open_time', $contact->open_time ?? '') }}">
                        </div>

                        <!-- Google Map URL -->
                        <div class="form-group">
                            <label for="map_url">Google Map URL:</label>
                            <input type="text" name="map_url" id="map_url" class="form-control"
                                   value="{{ old('map_url', $contact->map_url ?? '') }}">
                        </div>

                        <!-- Social Media Links -->
                        <div class="form-group">
                            <label for="fb_url">Facebook URL:</label>
                            <input type="url" name="fb_url" id="fb_url" class="form-control"
                                   value="{{ old('fb_url', $contact->fb_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="insta_url">Instagram URL:</label>
                            <input type="url" name="insta_url" id="insta_url" class="form-control"
                                   value="{{ old('insta_url', $contact->insta_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="wtsapp_url">WhatsApp URL:</label>
                            <input type="url" name="wtsapp_url" id="wtsapp_url" class="form-control"
                                   value="{{ old('wtsapp_url', $contact->wtsapp_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="twi_url">Twitter URL:</label>
                            <input type="url" name="twi_url" id="twi_url" class="form-control"
                                   value="{{ old('twi_url', $contact->twi_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="you_url">YouTube URL:</label>
                            <input type="url" name="you_url" id="you_url" class="form-control"
                                   value="{{ old('you_url', $contact->you_url ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="other_url">Other URL:</label>
                            <input type="url" name="other_url" id="other_url" class="form-control"
                                   value="{{ old('other_url', $contact->other_url ?? '') }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($contact) ? 'Update Contact' : 'Create Contact' }}
                            </button>
                        </div>
                    </form>

                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
