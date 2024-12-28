@extends('components.main')

@section('content')
{{-- Banner Section --}}
<div class="relative bg-gray-900 overflow-hidden">
    <!-- Slider Wrapper -->
    <div id="slider" class="relative flex transition-transform duration-700 ease-in-out">
      @foreach ($banners as $banner)
        <div class="w-full flex-shrink-0 relative">
          <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-[500px] object-cover">
          <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="text-center text-white px-6">
              <h1 class="text-4xl font-bold mb-4">{{ $banner->title }}</h1>
              <p class="text-lg mb-6">{!! $banner->sub_title !!}</p>
              {{-- Uncomment and customize this if needed --}}
              {{-- <a href="{{ $banner->url }}" class="border border-white text-white font-semibold py-3 px-6 hover:bg-white hover:text-black">
                Book Now
              </a> --}}
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      @foreach ($banners as $key => $banner)
        <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="{{ $key }}" aria-label="Slide {{ $key + 1 }}"></button>
      @endforeach
    </div>
</div>

<script>
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('#slider > div');
    const dots = document.querySelectorAll('[data-slide]');
    let currentIndex = 0;
    let slideInterval;

    // Update slider and dots
    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('bg-white', index === currentIndex);
            dot.classList.toggle('bg-gray-400', index !== currentIndex);
        });
    }

    // Move to the next slide
    function autoSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }

    // Start auto-slide
    function startAutoSlide() {
        slideInterval = setInterval(autoSlide, 5000); // Slides every 5 seconds
    }

    // Stop auto-slide
    function stopAutoSlide() {
        clearInterval(slideInterval);
    }

    // Manual navigation
    dots.forEach(dot => {
        dot.addEventListener('click', (e) => {
            currentIndex = parseInt(e.target.getAttribute('data-slide'));
            updateSlider();
            stopAutoSlide(); // Stop auto-slide temporarily
            startAutoSlide(); // Restart auto-slide
        });
    });

    // Pause auto-slide on interaction
    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);

    // Initialize
    updateSlider();
    startAutoSlide();
</script>



{{-- Explore Section --}}
<div class="container mx-auto lg:px-24 px-4 py-12 bg-white">
    @forelse ($productCategoryTitle as $title)
    <h1 class="text-center text-3xl font-bold mb-2">{{ $title->title }}</h1>
    <p class="text-center text-lg text-gray-600 mb-10">
        {{ $title->sub_title }}
    </p>
    @empty
  no title 
    @endforelse


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($productCategories as $category)
            <div class="bg-gray-100 lg:p-6 p-1 text-center rounded-lg hover:shadow-lg transition">
                {{-- Display the category image --}}
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->category_name }}" class="w-20 h-20 mx-auto mb-4">

                {{-- Display the category name and link to its details page --}}
                <a href="{{ route('category.details', $category->id) }}"
                   class="text-sm font-medium text-gray-700 inline-flex items-center hover:text-[#75CDD8] transition">
                    {{ $category->category_name }} <i class="ri-arrow-right-line ml-1"></i>
                </a>
            </div>
        @endforeach
    </div>

</div>

{{-- Product Section --}}
<div class="container bg-[#F3F4F6] max-w-full">
    <!-- Header Section -->
    @forelse ($productTitle->take(1) as $proTitle)
    <div class="text-center mb-16 ">
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('asset/image/e-bike.png') }}" alt="E-Bike" class="w-20 h-20 rounded-full mr-4">
            <h1 class="text-2xl lg:text-3xl font-extrabold text-black">{{ $proTitle->title }}</h1>
        </div>
        <p class="text-lg lg:text-xl text-gray-700 mt-4 leading-relaxed">
          {{ $proTitle->sub_title }}
        </p>
    </div>

    @empty
    <p class="text-gray-500">No  productsTitle found.</p>
    @endforelse

    <!-- Products Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mx-2 md:mx-20 lg:mx-24 ">
        <!-- Product Card -->
        @forelse ($products->take(8) as $product)
        <div class="bg-white md:p-6 m-4 p-4 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset(asset('storage/' . explode(',', $product->image)[0])) }}" alt="E-Scooter Model" class="w-full h-52 object-cover object-center rounded-lg">
                <div class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-2 rounded-full border border-gray-300">
                    NEW
                </div>
            </div>
            <h2 class="text-2xl font-bold text-black mt-6">{{ $product->title }}</h2>
            <p class="text-xl font-medium text-black">{{ $product->sub_title }}</p>
            <p class="text-lg text-gray-700 mt-4">
                Price: <span class="font-semibold text-[#75CDD8]">$ {{ $product->price }}</span>
            </p>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#75CDD8]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-600">SKUN:-{{ $product->sku_number }}</span>
                </div>
            </div>
            <button class="mt-6 w-full border border-[#75CDD8] text-[#75CDD8] font-bold py-3  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
              <a href="{{route('productdetail',$product->id)}}"> Details</a>
            </button>
        </div>
        @empty
        <p class="text-gray-500">No  products found.</p>
        @endforelse



    </div>

    <!-- See More Button -->
    {{-- <div class="text-center mt-16">
        <a href="#" class="inline-block text-black py-3 px-10 text-lg font-medium transition">
            See More
        </a>
    </div> --}}

    <!-- Decorative SVG Divider -->
    {{-- <div class="relative -mt-20">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" aria-hidden="true">
            <path fill="#ffffff" d="M0,160L40,149.3C80,139,160,117,240,128C320,139,400,181,480,176C560,171,640,117,720,112C800,107,880,149,960,160C1040,171,1120,149,1200,133.3C1280,117,1360,107,1400,101.3L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </div> --}}
</div>

{{-- Made for Nordic conditions --}}
<div class="relative mt-8">
    @forelse ($aboutUs->skip(1)->take(1) as $about)
    <img src="{{ asset('storage/'.$about->image) }}"
         alt="Momas Electric Bikes Background"
         class="w-full h-[60vh] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4 py-6">
        <h1 class="text-white text-xl md:text-xl lg:text-4xl font-bold mb-4 leading-tight">
            {{ $about->title }}
        </h1>
        <p class="text-white text-base md:text-lg lg:text-xl mb-6 max-w-2xl">
            {!! $about->description !!}
        </p>
        {{-- <button class="bg-white text-black py-3 px-8 rounded-md text-lg font-medium hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition duration-300">
          <a href="">  Book Now</a>
        </button> --}}
    </div>
    @empty
    <p class="text-gray-500">No  data found.</p>
    @endforelse
</div>

{{-- WHO WE ARE?? --}}
<div class="flex flex-col lg:flex-row items-center lg:items-start gap-8 p-6 lg:p-12 bg-gray-50">
    <!-- Image Section -->
    @forelse ($aboutUs->take(1) as $about)
    <div class="w-full lg:w-1/2 h-full">
        <img src="{{ asset('storage/'.$about->image) }}"
             alt="Who Are We - Image"
             class="w-full h-64 lg:h-96 rounded-lg shadow-md object-cover">
    </div>
    <div class="w-full lg:w-1/2 text-center lg:text-left">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            {{ $about->title }}
        </h1>
        <p class="text-black-800 text-base md:text-lg leading-relaxed mb-6" >
            {{ $about->heading }}
        </p>
        <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-6">
            {!! $about->description !!}
        </p>
        <button class="border border-gray-800 text-gray-800 py-2 px-6 text-lg font-medium hover:bg-gray-800 hover:text-white transition duration-300">
            Read more
        </button>
    </div>
    @empty
    <p class="text-gray-500">No  data found.</p>
    @endforelse


    <!-- Content Section -->

</div>

{{-- OUR SERVICES --}}
<section class="py-12 bg-white lg:mx-24">
    <div class="container mx-auto px-4">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Our Feature</h2>
        <p class="text-gray-600 mt-2">We provide a range of TopFeatures to help your business thrive.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service 1 -->
        @forelse ($testimonials as $testimonial)
        <div class="bg-gray-100 shadow-xs rounded-lg p-6 text-center">
            <div class="mb-4 flex justify-center">

              <img src="{{asset('storage/'.$testimonial->image)}}" alt="" class="h-20 w-20">
            </div>
            <h3 class="text-xl font-semibold text-gray-800">{{ $testimonial->name }}</h3>
            <p class="text-gray-600 mt-2">
              {!! $testimonial->msg !!}
            </p>
          </div>
        @empty
        <p class="text-gray-500">No  data found.</p>
        @endforelse




      </div>
    </div>
  </section>

  <section id="contact" class="bg-gray-100 py-12">
    @forelse ($contacts as $contact)
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-[#3f7177] mb-8">{{ $contact->con_title }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-[white]">
          <!-- Office Information -->
          <div class="rounded-lg p-6">
            <h3 class="text-xl font-semibold text-[#75CDD8] mb-4">{{ $contact->title }}</h3>
            <p class="text-gray-600">
              <strong>Address:</strong><br>
              {{ $contact->address }}
            </p>
            <p class="mt-4 text-gray-600">
              <strong>Phone:</strong> <a href="tel:{{ $contact->phone }}" class="text-[#75CDD8] hover:underline">{{ $contact->phone }}</a>
            </p>
            <p class="mt-2 text-gray-600">
              <strong>Email:</strong> <a href="mailto:{{ $contact->email }}" class="text-[#75CDD8] hover:underline">{{ $contact->email }}</a>
            </p>
            <p class="mt-4 text-gray-600">
              <strong>Opening Hours:</strong><br>
              {{ $contact->open_time }}
            </p>

            <!-- Social Media Icons -->
            <div class="mt-4 flex space-x-4">
              @if($contact->fb_url)
                <a href="{{ $contact->fb_url }}" target="_blank" class="text-gray-700 hover:text-blue-600" aria-label="Facebook">
                  <i class="ri-facebook-fill text-2xl"></i>
                </a>
              @endif
              @if($contact->twi_url)
                <a href="{{ $contact->twi_url }}" target="_blank" class="text-gray-700 hover:text-blue-400" aria-label="Twitter">
                  <i class="ri-twitter-fill text-2xl"></i>
                </a>
              @endif
              @if($contact->insta_url)
                <a href="{{ $contact->insta_url }}" target="_blank" class="text-gray-700 hover:text-pink-600" aria-label="Instagram">
                  <i class="ri-instagram-fill text-2xl"></i>
                </a>
              @endif
              @if($contact->you_url)
                <a href="{{ $contact->you_url }}" target="_blank" class="text-gray-700 hover:text-red-600" aria-label="YouTube">
                  <i class="ri-youtube-fill text-2xl"></i>
                </a>
              @endif
              @if($contact->wtsapp_url)
                <a href="{{ $contact->wtsapp_url }}" target="_blank" class="text-gray-700 hover:text-green-600" aria-label="WhatsApp">
                  <i class="ri-whatsapp-fill text-2xl"></i>
                </a>
              @endif
            </div>
          </div>

          {{-- Map --}}
          <div>
              <iframe
                src="{{ $contact->map_url }}"
                width="100%"
                height="350"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded-lg shadow-sm"
                aria-label="Google Maps location"
              ></iframe>
          </div>
        </div>
      </div>
  @empty
    <p class="text-gray-500">No data found.</p>
  @endforelse


  </section>


@endsection
