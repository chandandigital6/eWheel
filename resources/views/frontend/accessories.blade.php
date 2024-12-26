@extends('components.main')
@section('content')
<main class="container mx-auto py-10">

    <div class="py-4">
        <h1 class="text-2xl font-medium ">Accessories</h1>
    </div>

    <div class="flex flex-wrap justify-between items-center mb-6 space-x-4">
        <div class="flex flex-wrap space-x-4 mb-4 lg:mb-0">
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
        </div>
    </div>
    

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 m-4">
        <!-- Example Product Card -->
        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories1.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Momas Balance+</h3>
                <p class="text-gray-600">From €2,191.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories2.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Hvitserk</h3>
                <p class="text-gray-600">€3,181.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>
        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories1.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Embla</h3>
                <p class="text-gray-600">€4,419.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/e-wheelchair.jpg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Ragnar</h3>
                <p class="text-gray-600">€4,419.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>

           <!-- Example Product Card -->
           <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories2.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Momas Balance+</h3>
                <p class="text-gray-600">From €2,191.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories1.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Hvitserk</h3>
                <p class="text-gray-600">€3,181.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>
        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories1.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Embla</h3>
                <p class="text-gray-600">€4,419.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>

        <div class="bg-white shadow rounded overflow-hidden">
            <img src="{{asset('assets/image/accessories2.jpeg')}}" alt="Product" class="w-full">
            <div class="p-4">
                <h3 class="font-bold text-lg">Fosna Ragnar</h3>
                <p class="text-gray-600">€4,419.00 EUR</p>
                <a href="{{route('productdetail')}}">  <button class="border border-[#75CDD8] m-2 text-center p-2 text-[#75CDD8]">View details</button></a>
            </div>
        </div>
        <!-- Add more products as needed -->
    </div>

    <div class="flex justify-center mt-10">
        <button class="border px-4 py-2 mx-1 rounded bg-white">1</button>
        <button class="border px-4 py-2 mx-1 rounded bg-white">2</button>
        <button class="border px-4 py-2 mx-1 rounded bg-white">></button>
    </div>
</main>
@endsection