
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
                            <h1>product</h1>
                            <a href="{{ route('product.create') }}" class="btn btn-light">Create product</a>
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
                                        <th>Sub Title</th>
                                        <th>SKU Number</th>
                                        {{-- <th>Short Description</th> --}}
                                        {{-- <th>Long Description</th> --}}
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productData as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->sub_title }}</td>
                                            <td>{{ $product->sku_number }}</td>
                                            {{-- <td>{!! $product->short_description !!}</td> --}}
                                            {{-- <td>{!! $product->long_description !!}</td> --}}
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}" style="max-width: 100px;">
                                            </td>
                                            <td>

                                                {{-- <a href="{{ route('product.qr', $product->id) }}" class="btn btn-primary">showQr</a> --}}
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ route('product.duplicate', $product->id) }}" class="btn btn-warning">Duplicate</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">No products found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card-footer">
                        <!-- Pagination links can be added here if needed -->
                        {{ $productData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
