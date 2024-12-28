@extends('components.main')

@section('content')
    <section class="product py-12 px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Photo Section -->
            <div class="product__photo">
                <div class="photo-container relative">
                    <!-- Main Product Image -->
                    <div class="photo-main relative">
                        <div class="controls absolute top-4 right-4 flex space-x-4">
                            <i class="ri-share-line text-white bg-black bg-opacity-50 p-2 rounded-full cursor-pointer"
                                onclick="shareProduct()"></i>
                            <i class="ri-heart-3-line text-white bg-black bg-opacity-50 p-2 rounded-full cursor-pointer"
                                onclick="toggleFavorite()"></i>
                        </div>
                        <!-- Set the first image as the main image -->
                        @php
                            $images = explode(',', $product->image); // Assuming images are stored as a comma-separated string
                        @endphp
                        <img id="main-image" src="{{ asset('storage/' . $images[0]) }}" alt="{{ $product->title }}"
                            class="w-full h-[500px] object-cover rounded-lg shadow-lg">
                    </div>

                    <!-- Photo Album Thumbnails -->
                    <div class="photo-album mt-4">
                        <ul class="flex space-x-2 overflow-x-auto">
                            @foreach ($images as $image)
                                <li>
                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->title }} Thumbnail"
                                        class="w-16 h-16 object-cover rounded-lg cursor-pointer"
                                        onclick="changeImage('{{ asset('storage/' . $image) }}')">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript to change the main image when a thumbnail is clicked
                function changeImage(src) {
                    document.getElementById('main-image').src = src;
                }
            </script>


            <!-- Product Info Section -->
            <div class="product__info">

                <div class="title mb-6">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h1>
                    <span class="text-sm text-gray-600">{{ $product->sub_title }}</span> <br>
                    <span class="text-sm text-gray-600">SKU Number: {{ $product->sku_number }}</span>
                </div>
                <div class="price mb-6">
                    <span class="text-2xl font-semibold text-gray-900">€ {{ $product->price }}</span>
                </div>

                {{-- <div class="country-selection mb-6">
                    <p class="text-lg font-semibold text-gray-800">This product is only available in selected countries.</p>
                    <select id="country-select" class="mt-2 w-full p-3 border border-gray-300 rounded-lg">
                        <option value="eu">Select Country</option>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <!-- Add more countries here -->
                    </select>
                    <p id="shipping-info" class="text-sm text-gray-500 mt-2">Not available in your country yet? <a
                            href="#" class="text-blue-500">Contact us</a></p>
                </div> --}}

                <div class="description mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Short Description</h3>
                    <p class="text-gray-700">
                        {!! $product->short_description !!}
                    </p>
                </div>
                <div class="description mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Product Description</h3>
                    <p class="text-gray-700">
                        {!! $product->long_description !!}
                    </p>
                </div>

                <div class="description mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Accessories</h3>
                    <p class="text-gray-700">
                        {!! $product->accessories !!}
                    </p>
                </div>

                <div class="accessories mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Top Feature</h3>
                    <ul class="list-none pl-0">
                        <li class="text-gray-700">
                            <strong></strong>
                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_1 }}</strong>
                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_2 }}</strong>
                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_3 }}</strong>
                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_4 }}</strong>

                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_5 }}</strong>
                        </li>
                        <li class="text-gray-700">
                            <strong>{{ $product->f_6 }}</strong>
                        </li>
                    </ul>
                </div>


                <button onclick="toggleModal(true)"
                    class="px-6 py-3 text-black bg-[#75CDD8] hover:bg-[#75CDD8] rounded-md shadow-md transition">
                    Book Now
                </button>

                <!-- Modal -->
                <div id="booking-modal"
                    class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg relative">
                        <button onclick="toggleModal(false)"
                            class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                            &times;
                        </button>

                        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Book Your E-Wheel</h2>

                        <form action="{{ route('appointment.store') }}" method="POST">
                            @csrf

                            <!-- Full Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('name')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('email')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-4">
                                <label for="number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" id="number" name="number" value="{{ old('number') }}" required
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('number')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Select Product -->
                            <div class="mb-4">
                                <label for="product_name" class="block text-sm font-medium text-gray-700">Select Product</label>
                                <select id="product_name" name="product_name" required
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select a product</option>
                                    <option value="e-scooter" {{ old('product_name') == 'e-scooter' ? 'selected' : '' }}>
                                        E-Scooter</option>
                                    <option value="e-unicycle" {{ old('product_name') == 'e-unicycle' ? 'selected' : '' }}>
                                        E-Unicycle</option>
                                    <option value="bike" {{ old('product_name') == 'bike' ? 'selected' : '' }}>Bike</option>
                                </select>
                                @error('product_name')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Booking Date -->
                            <div class="mb-4">
                                <label for="book_date" class="block text-sm font-medium text-gray-700">Booking Date</label>
                                <input type="date" id="book_date" name="book_date" value="{{ old('book_date') }}" required
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('book_date')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div class="mb-4">
                                <label for="msg" class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea id="msg" name="msg" placeholder="Write your message here..."
                                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('msg') }}</textarea>
                                @error('msg')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="bg-[#75CDD8] text-white py-2 px-4 rounded-md hover:bg-[#75CDD8] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Submit Booking
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- You May Also Like Section -->
        <div class="related-products mt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">You May Also Like</h3>
            <div class="flex space-x-4 overflow-x-auto">
                @forelse ($relatedProducts as $related)
                    <div class="bg-white shadow rounded-lg overflow-hidden p-4 text-center min-w-[150px]">
                        <a href="{{ route('productdetail', $related->id) }}">
                            <img src="{{ asset('storage/' . explode(',', $related->image)[0]) }}"
                                alt="{{ $related->title }}" class="w-24 h-24 object-cover rounded-lg mx-auto">
                        </a>
                        <p class="text-gray-700 mt-2 font-medium">{{ $related->title }}</p>
                        <p class="text-gray-600 text-sm">{{ $related->price }} EUR</p>
                    </div>
                @empty
                    <p class="text-gray-500">No related products found.</p>
                @endforelse
            </div>
        </div>



    </section>


    <!-- Add JavaScript for dynamic interactions -->
    <script>
        function changeImage(imageSrc) {
            document.getElementById('main-image').src = imageSrc;
        }

        function shareProduct() {
            alert('Product shared!');
        }

        function toggleFavorite() {
            alert('Added to favorites!');
        }

        document.getElementById('country-select').addEventListener('change', function() {
            const selectedCountry = this.value;
            const shippingInfo = document.getElementById('shipping-info');
            if (selectedCountry === 'us') {
                shippingInfo.textContent = 'Shipping available to the United States.';
            } else if (selectedCountry === 'uk') {
                shippingInfo.textContent = 'Shipping available to the United Kingdom.';
            } else {
                shippingInfo.textContent = 'Not available in your country yet? Contact us';
            }
        });
    </script>
    <script>
        function toggleModal(show) {
            const modal = document.getElementById("booking-modal");
            modal.classList.toggle("hidden", !show);
        }
    </script>
@endsection
