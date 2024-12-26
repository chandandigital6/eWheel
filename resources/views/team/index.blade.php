@extends('layouts.aap')

@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Teams</h1>
                            <a href="{{ route('team.create') }}" class="btn btn-light">Create Team</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>title</th>
                                    <th>Msg</th>
                                   <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Whatsapp</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($teamData as $team)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/'.$team->image) }}" alt="{{ $team->name }}" style="max-width: 100px;"></td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{$team->title}}</td>
                                        <td>{{$team->msg}}</td>
                                        <td>
                                            @if($team->fb_url)
                                                <a href="{{ $team->fb_url }}" target="_blank" rel="noopener noreferrer">
                                                    <i class="fa fa-facebook-square" style="font-size:20px;color:red">facebook</i>
                                                </a>
                                            @endif
                                      </td>
                                          <td>
                                            @if($team->in_url)
                                                <a href="{{ $team->in_url }}" target="_blank" rel="noopener noreferrer">
                                                    <i class="fa fa-instagram">insta</i>
                                                </a>
                                            @endif
                                          </td>>
                                        <td>
                                            @if($team->wat_url)
                                                <a href="{{ $team->wat_url }}" target="_blank" rel="noopener noreferrer">
                                                    <i class="fa fa-whatsapp">whatsapp</i>
                                                </a>
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('team.delete', $team->id) }}" class="btn btn-danger">Delete</a>
                                            <!-- Add delete button if needed -->
                                            <a href="{{ route('team.duplicate', $team->id) }}" class="btn btn-warning">Duplicate</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No posts found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        <!-- Pagination links can be added here if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
