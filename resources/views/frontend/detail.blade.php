@extends('components.main')
@section('comtent')
<div class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-wrap -mx-4">
        <!-- Product Images -->
        <div class="w-full md:w-1/2 px-4 mb-8">
          <img src="{{asset('storage/'.$product->image)}}" alt="Product"
                      class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
          {{-- <div class="flex gap-4 py-4 justify-center overflow-x-auto">
            <img src="{{asset('image/products.png')}}" alt="Thumbnail 1"
                          class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                          onclick="changeImage(this.src)">
            <img src="{{asset('image/e-rickshaw-battery.png')}}" alt="Thumbnail 2"
                          class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                          onclick="changeImage(this.src)">
            <img src="{{asset('image/QUALITY.png')}}" alt="Thumbnail 3"
                          class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                          onclick="changeImage(this.src)">
            <img src="{{asset('image/products.png')}}" alt="Thumbnail 4"
                          class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                          onclick="changeImage(this.src)">
          </div> --}}
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 px-4">
          <h2 class="text-3xl font-bold mb-2">{{ $product->title }}</h2>
          <p class="text-gray-600 mb-4">SKU: {{ $product->sku_number }}</p>

          <div class="mb-4">
              <span class="text-2xl font-bold mr-2"> ₹:-{{ $product->price }}</span>
              {{-- <span class="text-gray-500 line-through">$399.99</span> --}}
          </div>

          <!-- Short Description -->
          <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">ShortDescription:</h3>
            <p class="text-gray-700">{!! $product->short_description !!}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">LongDescription:</h3>
            <p class="text-gray-700">{!! $product->long_description !!}</p>
        </div>

          <!-- Long Description -->

          
          <!-- Category & Types -->
          <div class="mb-6">
              <h3 class="text-lg font-semibold mb-2">Category:</h3>
              <p class="text-gray-700">{{ $product->category_name }}</p>
          </div>


{{--
          <!-- Quantity -->
          <div class="mb-6">
              <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
              {{ $product->qty }}
          </div> --}}

          <!-- Key Features -->
          <div class="mb-6">
              <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
              <ul class="list-disc list-inside text-gray-700">
                  <li>{{ $product->f_1 }}</li>
                  <li>{{ $product->f_2 }}</li>
                  <li>{{ $product->f_3 }}</li>
                  <li>{{ $product->f_4 }}</li>
                  <li>{{ $product->f_5 }}</li>
                  <li>{{ $product->f_6 }}</li>
              </ul>
          </div>



          <!-- Contact Us Button -->
          <div>
              <button class="bg-gradient-to-r from-green-500 to-black flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                  </svg>
                  <a href="https://lithopowerr.com/#contact">Contact Us</a>

              </button>
          </div>
      </div>

      </div>
    </div>

    <script>
      function changeImage(src) {
              document.getElementById('mainImage').src = src;
          }
    </script>
  </div>
@endsection
