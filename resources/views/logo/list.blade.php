@extends('layouts.aap')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Logos List</h3>
                </div>
                <div class="card-body p-4">
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Logos Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Header Logo</th>
                                    <th>Footer Logo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logos as $logo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($logo->header_logo)
                                                <img src="{{ asset('storage/' . $logo->header_logo) }}" alt="Header Logo" class="img-thumbnail" style="max-width: 100px;">
                                            @else
                                                <p class="text-muted">No logo</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($logo->footer_logo)
                                                <img src="{{ asset('storage/' . $logo->footer_logo) }}" alt="Footer Logo" class="img-thumbnail" style="max-width: 100px;">
                                            @else
                                                <p class="text-muted">No logo</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('logo.edit', $logo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('logo.destroy', $logo->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this logo?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No logos available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Add New Logo Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('logo.add') }}" class="btn btn-primary">Add New Logo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
