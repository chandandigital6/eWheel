@extends('layouts.aap')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('success'))
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
                            <h1>ContactDetails</h1>
                            <a href="{{ route('contact.create') }}" class="btn btn-light">Create contact</a>
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
                            <table class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Contact Title</th>
                                        <th>Title</th>
                                        <th>address</th>
                                        <th>Social Links</th>
                                        <th>map</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contactData as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->con_title }}</td>
                                            <td>{{ $contact->title }}</td>
                                            <td>{!! $contact->address !!}</td>
                                            <td>
                                                <ul class="list-unstyled">
                                                    @if ($contact->fb_url)
                                                        <li><a href="{{ $contact->fb_url }}" target="_blank">Facebook</a>
                                                        </li>
                                                    @endif
                                                    @if ($contact->insta_url)
                                                        <li><a href="{{ $contact->insta_url }}"
                                                                target="_blank">Instagram</a></li>
                                                    @endif
                                                    @if ($contact->wtsapp_url)
                                                        <li><a href="{{ $contact->wtsapp_url }}"
                                                                target="_blank">WhatsApp</a></li>
                                                    @endif
                                                    @if ($contact->twi_url)
                                                        <li><a href="{{ $contact->twi_url }}" target="_blank">Twitter</a>
                                                        </li>
                                                    @endif
                                                    @if ($contact->you_url)
                                                        <li><a href="{{ $contact->you_url }}" target="_blank">YouTube</a>
                                                        </li>
                                                    @endif
                                                    @if ($contact->other_url)
                                                        <li><a href="{{ $contact->other_url }}" target="_blank">Other</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td>
                                                @if ($contact->map_url)
                                                    <iframe src="{{ $contact->map_url }}" width="100%" height="350"
                                                        style="border:0;" allowfullscreen="" loading="lazy"
                                                        referrerpolicy="no-referrer-when-downgrade"
                                                        class="rounded-lg shadow-sm"
                                                        aria-label="Google Maps location of eWheels Ratchada-Huai Khwang"></iframe>
                                                @else
                                                    <p>No map available</p>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('contact.edit', $contact->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('contact.delete', $contact->id) }}" method="get"
                                                    class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                <a href="{{ route('contact.duplicate', $contact->id) }}"
                                                    class="btn btn-sm btn-warning">Duplicate</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No contacts found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        {{ $contactData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
