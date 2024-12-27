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
                            <h1>productCategoryTitle</h1>
                            <a href="{{ route('productCategoryTitle.create') }}" class="btn btn-light">Create productCategoryTitle</a>
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
                                    <th>Title</th>
                                    <th>Sub title</th>
                                    {{-- <th>Image</th> --}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($productCategoryTitleData as $productCategoryTitle)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $productCategoryTitle->title }}</td>
                                        <td>{{$productCategoryTitle->sub_title}}</td>
                                        {{-- <td><img src="{{ asset('storage/'.$productCategoryTitle->image) }}" alt="{{ $productCategoryTitle->title }}" style="max-width: 100px;"></td> --}}

{{--                                        <td>--}}
{{--                                            @if($productCategoryTitle->status)--}}
{{--                                                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                                                </svg>--}}
{{--                                            @else--}}
{{--                                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                                                </svg>--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                                                                <td><img src="{{ asset('storage/'.$productCategoryTitle->image) }}" alt="{{ $productCategoryTitle->title }}" style="max-width: 100px;"></td>--}}
                                        <td>
                                            <a href="{{ route('productCategoryTitle.edit', $productCategoryTitle->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('productCategoryTitle.delete', $productCategoryTitle->id) }}" class="btn btn-danger">Delete</a>
                                            <!-- Add delete button if needed -->
                                            {{-- <a href="{{ route('productCategoryTitle.duplicate', $productCategoryTitle->id) }}" class="btn btn-warning">Duplicate</a> --}}

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
                        {{ $productCategoryTitleData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
