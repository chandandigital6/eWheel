@extends('components.main')
@section('content')
<main class="container mx-auto py-10">

    <div class="py-4">
        <h1 class="text-2xl font-medium ">{{ $category->category_name }}</h1>
    </div>

    <div class="flex flex-wrap justify-between items-center mb-6 space-x-4">
        {{-- <div class="flex flex-wrap space-x-4 mb-4 lg:mb-0">
            <select class="border p-2 rounded w-full sm:w-auto">
                <option>Availability</option>
                <option>In Stock</option>
                <option>Out of Stock</option>
            </select>
            <select class="border p-2 rounded w-full sm:w-auto">
                <option>Price</option>
                <option>Low to High</option>
                <option>High to Low</option>
            </select>
            <select class="border p-2 rounded w-full sm:w-auto">
                <option>Brand</option>
                <option>Brand A</option>
                <option>Brand B</option>
            </select>
            <select class="border p-2 rounded w-full sm:w-auto">
                <option>Type</option>
                <option>Type A</option>
                <option>Type B</option>
            </select>
        </div>
        <div class="flex items-center space-x-2">
            <label for="sort" class="text-gray-600">Sort by:</label>
            <select id="sort" class="border p-2 rounded w-full sm:w-auto">
                <option>Best Selling</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
            </select>
        </div> --}}
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 m-4 gap-6">
        <!-- Example Product Card -->
        @forelse ($category->products as $product)
            <div class="bg-white shadow rounded overflow-hidden">
                @php
                    // Explode the images string to get the first image
                    $images = explode(',', $product->image);
                    $firstImage = $images[0] ?? 'default-image.png'; // Use a default image if no image is available
                @endphp
                <a href="{{ route('productdetail', $product->id) }}">
                    <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->title }}" class="w-full">
                </a>
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $product->title }}</h3>
                    <p class="text-gray-600">{{ $product->price }} EUR</p>
                    <a href="{{ route('productdetail', $product->id) }}">
                        <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button>
                    </a>
                </div>
            </div>
        @empty
            <p>No products found in this category.</p>
        @endforelse
    </div>


    <div class="flex justify-center mt-10">
       {{-- {{ $category->links() }} --}}
    </div>
</main>
@endsection
