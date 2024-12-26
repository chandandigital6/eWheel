@extends('layouts.aap')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Create Team Member</h2>
                <form action="{{ route('team.update',$team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @if($team->image)
                            <img src="{{asset('storage/'.$team->image)}}" alt="" width="200px">
                        @else
                            no image
                        @endif
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $team->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $team->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="msg">Massage</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="msg" value="{{$team->msg }}">
                        @error('msg')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="fb_url">Facebook URL</label>
                        <input type="url" class="form-control @error('fb_url') is-invalid @enderror" id="fb_url" name="fb_url" value="{{ $team->fb_url }}">
                        @error('fb_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="in_url">Instagram URL</label>
                        <input type="url" class="form-control @error('in_url') is-invalid @enderror" id="in_url" name="in_url" value="{{ $team->in_url }}">
                        @error('in_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="wat_url">WhatsApp URL</label>
                        <input type="url" class="form-control @error('wat_url') is-invalid @enderror" id="wat_url" name="wat_url" value="{{ $team->wat_url }}">
                        @error('wat_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
