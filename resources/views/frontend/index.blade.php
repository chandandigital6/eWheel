@extends('components.main')

@section('content')
{{-- Banner Section --}}
{{-- <div class="relative bg-gray-900">
    <!-- Banner Image -->
    <img src="{{ asset('assets/image/banner.jpg') }}" alt="Green Mobility Banner" class="w-full h-[500px] object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-6">
            <h1 class="text-4xl font-bold mb-4">Unleash the Power of Green Mobility!</h1>
            <p class="text-lg mb-6">
                E-Wheels is the biggest retailer of small electric vehicles in Scandinavia. <br>
                Explore our test-winning selection of electric bikes and scooters.
            </p>
            <a href="#" class="inline-block border border-white text-white font-semibold py-3 px-6 hover:bg-black hover:text-white transition-all">
                Shop Now
            </a>
        </div>
    </div>
</div> --}}
<div class="relative bg-gray-900 overflow-hidden">
  <!-- Slider Wrapper -->
  <div id="slider" class="relative flex transition-transform duration-700 ease-in-out">
      <!-- Slide 1 -->
      <div class="w-full flex-shrink-0">
          <img src="{{ asset('assets/image/banner.jpg') }}" alt="Green Mobility Banner" class="w-full h-[500px] object-cover">
          <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
              <div class="text-center text-white px-6">
                  <h1 class="text-4xl font-bold mb-4">Discover our range of electric Wheels</h1>
                  <p class="text-lg mb-6">
                    E-Wheels is the biggest retailer of small electric vehicles in Scandinavia.
                   <br> Explore our test-winning selection of electric bikes and scooters.
                    
                  </p>
                  <a href="{{route('productdetail')}}" class="inline-block border border-white text-white font-semibold py-3 px-6 hover:bg-black hover:text-white transition-all">
                      Book Now
                  </a>
              </div>
          </div>
      </div>
      <!-- Slide 2 -->
      <div class="w-full flex-shrink-0">
          <img src="{{ asset('assets/image/banner1.jpeg') }}" alt="Eco-Friendly Transportation" class="w-full h-[500px] object-cover">
          {{-- <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
              <div class="text-center text-white px-6">
                  <h1 class="text-4xl font-bold mb-4">Eco-Friendly Transportation!</h1>
                  <p class="text-lg mb-6">
                      Make a difference with our sustainable and affordable electric vehicles.
                  </p>
                  <a href="#" class="inline-block border border-white text-white font-semibold py-3 px-6 hover:bg-black hover:text-white transition-all">
                      Learn More
                  </a>
              </div>
          </div> --}}
      </div>
      <!-- Slide 3 -->
      <div class="w-full flex-shrink-0">
          <img src="{{ asset('assets/image/banner3.jpeg') }}" alt="Ride the Future" class="w-full h-[500px] object-cover">
          {{-- <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
              <div class="text-center text-white px-6">
                  <h1 class="text-4xl font-bold mb-4">Ride the Future!</h1>
                  <p class="text-lg mb-6">
                      Discover innovative designs and cutting-edge technology.
                  </p>
                  <a href="#" class="inline-block border border-white text-white font-semibold py-3 px-6 hover:bg-black hover:text-white transition-all">
                      Discover Now
                  </a>
              </div>
          </div> --}}
      </div>
  </div>

  <!-- Navigation Dots -->
  <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <button class="w-3 h-3 bg-white rounded-full" data-slide="0" aria-label="Slide 1"></button>
      <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="1" aria-label="Slide 2"></button>
      <button class="w-3 h-3 bg-gray-400 rounded-full" data-slide="2" aria-label="Slide 3"></button>
  </div>
</div>

<script>
  const slider = document.getElementById('slider');
  const slides = document.querySelectorAll('#slider > div');
  const dots = document.querySelectorAll('[data-slide]');
  let currentIndex = 0;
  let slideInterval;

  // Function to update the slider and dots
  function updateSlider() {
      slider.style.transform = `translateX(-${currentIndex * 100}%)`;
      dots.forEach((dot, index) => {
          dot.classList.toggle('bg-white', index === currentIndex);
          dot.classList.toggle('bg-gray-400', index !== currentIndex);
      });
  }

  // Function to move to the next slide automatically
  function autoSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider();
  }

  // Start the automatic sliding
  function startAutoSlide() {
      slideInterval = setInterval(autoSlide, 5000); // Auto-slide every 5 seconds
  }

  // Stop automatic sliding
  function stopAutoSlide() {
      clearInterval(slideInterval);
  }

  // Set up the manual navigation dots
  dots.forEach((dot) => {
      dot.addEventListener('click', (e) => {
          currentIndex = parseInt(e.target.getAttribute('data-slide'));
          updateSlider();
          stopAutoSlide();
          setTimeout(startAutoSlide, 5000); // Restart auto-slide after 5 seconds
      });
  });

  // Initialize the slider
  updateSlider();
  startAutoSlide(); // Start auto-slide on load

  // Optional: Pause auto-slide when user interacts with the slider
  slider.addEventListener('mouseenter', stopAutoSlide);
  slider.addEventListener('mouseleave', startAutoSlide);
</script>

{{-- Explore Section --}}
<div class="container mx-auto lg:px-24 px-4 py-12 bg-white">
    <h1 class="text-center text-3xl font-bold mb-2">Explore</h1>
    <p class="text-center text-lg text-gray-600 mb-10">
        Electric bikes and scooters for your every need, without compromising on looks or design.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ([
            ['title' => 'Electric Bikes', 'image' => 'e-bike.png'],
            ['title' => 'Electric Scooters', 'image' => 'e-sctoor.png'],
            ['title' => 'Spare Parts', 'image' => 'spare-parts.png'],
            ['title' => 'Retailers', 'image' => 'retail.png']
        ] as $item)
        <div class="bg-gray-100 lg:p-6 p-1 text-center rounded-lg hover:shadow-lg transition">
            <img src="{{ asset('assets/image/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-20 h-20 mx-auto mb-4">
            <a href="{{route('accessories')}}" class="text-sm font-medium text-gray-700 inline-flex items-center hover:text-[#75CDD8] transition">
                {{ $item['title'] }} <i class="ri-arrow-right-line ml-1"></i>
            </a>
        </div>
        @endforeach
    </div>
</div>

{{-- Product Section --}}
<div class="container bg-[#F3F4F6] max-w-full">
    <!-- Header Section -->
    <div class="text-center mb-16 ">
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('assets/image/e-bike.png') }}" alt="E-Bike" class="w-20 h-20 rounded-full mr-4">
            <h1 class="text-2xl lg:text-3xl font-extrabold text-black">E-Scooter | E-Wheels</h1>
        </div>
        <p class="text-lg lg:text-xl text-gray-700 mt-4 leading-relaxed">
            Experience the ultimate ride with our state-of-the-art scooters and wheels. Unmatched comfort and performance for your every journey.
        </p>
    </div>

    <!-- Products Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mx-2 md:mx-20 lg:mx-24 ">
        <!-- Product Card -->
        <div class="bg-white md:p-6 m-4 p-4 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('assets/image/eWheels.jpg') }}" alt="E-Scooter Model" class="w-full h-52 object-cover object-center rounded-lg">
                <div class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-2 rounded-full border border-gray-300">
                    NEW
                </div>
            </div>
            <h2 class="text-2xl font-bold text-black mt-6">E-Scooter Model</h2>
            <p class="text-xl font-medium text-black">sub titile</p>
            <p class="text-lg text-gray-700 mt-4">
                Price: <span class="font-semibold text-[#75CDD8]">$299.99</span>
            </p>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#75CDD8]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-600">4.9 (120 reviews)</span>
                </div>
            </div>
            <button class="mt-6 w-full border border-[#75CDD8] text-[#75CDD8] font-bold py-3  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
              <a href="{{route('productdetail')}}">  Book Now</a>
            </button>
        </div>
          
          <!-- Product Card -->
          <div class="bg-white md:p-6 m-4 p-4 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('assets/image/eWheels.jpg') }}" alt="E-Scooter Model" class="w-full h-52 object-cover object-center rounded-lg">
                <div class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-2 rounded-full border border-gray-300">
                    NEW
                </div>
            </div>
            <h2 class="text-2xl font-bold text-black mt-6">E-Scooter Model</h2>
            <p class="text-xl font-medium text-black">sub titile</p>
            <p class="text-lg text-gray-700 mt-4">
                Price: <span class="font-semibold text-[#75CDD8]">$299.99</span>
            </p>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#75CDD8]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-600">4.9 (120 reviews)</span>
                </div>
            </div>
            <button class="mt-6 w-full border border-[#75CDD8] text-[#75CDD8] font-bold py-3  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
              <a href="{{route('productdetail')}}">  Book Now</a>
            </button>
        </div>
          <!-- Product Card -->
          <div class="bg-white md:p-6 m-4 p-4 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('assets/image/eWheels.jpg') }}" alt="E-Scooter Model" class="w-full h-52 object-cover object-center rounded-lg">
                <div class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-2 rounded-full border border-gray-300">
                    NEW
                </div>
            </div>
            <h2 class="text-2xl font-bold text-black mt-6">E-Scooter Model</h2>
            <p class="text-xl font-medium text-black">sub titile</p>
            <p class="text-lg text-gray-700 mt-4">
                Price: <span class="font-semibold text-[#75CDD8]">$299.99</span>
            </p>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#75CDD8]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-600">4.9 (120 reviews)</span>
                </div>
            </div>
            <button class="mt-6 w-full border border-[#75CDD8] text-[#75CDD8] font-bold py-3  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
              <a href="{{route('productdetail')}}">  Book Now</a>
            </button>
        </div>
          <!-- Product Card -->
          <div class="bg-white md:p-6 m-4 p-4 rounded-2xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105">
            <div class="relative">
                <img src="{{ asset('assets/image/eWheels.jpg') }}" alt="E-Scooter Model" class="w-full h-52 object-cover object-center rounded-lg">
                <div class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-2 rounded-full border border-gray-300">
                    NEW
                </div>
            </div>
            <h2 class="text-2xl font-bold text-black mt-6">E-Scooter Model</h2>
            <p class="text-xl font-medium text-black">sub titile</p>
            <p class="text-lg text-gray-700 mt-4">
                Price: <span class="font-semibold text-[#75CDD8]">$299.99</span>
            </p>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#75CDD8]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="ml-1 text-gray-600">4.9 (120 reviews)</span>
                </div>
            </div>
            <button class="mt-6 w-full border border-[#75CDD8] text-[#75CDD8] font-bold py-3  transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
              <a href="{{route('productdetail')}}">  Book Now</a>
            </button>
        </div>
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
    <img src="{{ asset('assets/image/background') }}" 
         alt="Momas Electric Bikes Background" 
         class="w-full h-[60vh] object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4 py-6">
        <h1 class="text-white text-xl md:text-xl lg:text-4xl font-bold mb-4 leading-tight">
            Made for Nordic Conditions
        </h1>
        <p class="text-white text-base md:text-lg lg:text-xl mb-6 max-w-2xl">
            With top-notch quality and unbeatable prices, Momas are designed for Nordic conditions. From city streets to rugged terrain, join over 55,000 satisfied riders and experience the thrill of Momas electric bikes today!
        </p>
        <button class="bg-white text-black py-3 px-8 rounded-md text-lg font-medium hover:bg-black hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition duration-300">
          <a href="{{route('productdetail')}}">  Book Now</a>
        </button>
    </div>
</div>

{{-- WHO WE ARE?? --}}
<div class="flex flex-col lg:flex-row items-center lg:items-start gap-8 p-6 lg:p-12 bg-gray-50">
    <!-- Image Section -->
    <div class="w-full lg:w-1/2 h-full">
        <img src="{{ asset('assets/image/who') }}" 
             alt="Who Are We - Image" 
             class="w-full h-64 lg:h-96 rounded-lg shadow-md object-cover">
    </div>
    
    <!-- Content Section -->
    <div class="w-full lg:w-1/2 text-center lg:text-left">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
            Who are we?
        </h1>
        <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-6">
            We stand as the foremost retailer of personal electric small vehicles across the Nordic countries, leading the charge in the green revolution.
            <br><br>
            Our journey began humbly in 2014, like many other enterprises, originating in our own garage. Since then, we've proudly served over 250,000 satisfied customers.
            <br><br>
            Our commitment lies in providing a comprehensive selection of top-tier personal electric vehicles sourced from reputable manufacturers, all at competitive prices.
        </p>
        <button class="border border-gray-800 text-gray-800 py-2 px-6 text-lg font-medium hover:bg-gray-800 hover:text-white transition duration-300">
            Read more
        </button>
    </div>
</div>

{{-- OUR SERVICES --}}
<section class="py-12 bg-white lg:mx-24">
    <div class="container mx-auto px-4">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Our Services</h2>
        <p class="text-gray-600 mt-2">We provide a range of services to help your business thrive.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service 1 -->
        <div class="bg-gray-100 shadow-xs rounded-lg p-6 text-center">
          <div class="mb-4 flex justify-center">
            <!-- Replace this with an icon or image -->
            {{-- <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m12 8h-6m6 8h-6" />
            </svg> --}}
            <img src="{{asset('assets/image/service1.png')}}" alt="" class="h-20 w-20">
          </div>
          <h3 class="text-xl font-semibold text-gray-800">Service Title</h3>
          <p class="text-gray-600 mt-2">Brief description of the service offered, highlighting key benefits.</p>
        </div>
        <!-- Service 2 -->
        <div class="bg-gray-100 shadow-xs rounded-lg p-6 text-center">
          <div class="mb-4 flex justify-center">
            <!-- Replace this with an icon or image -->
            {{-- <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 21H3V10h6m12 11v-6a3 3 0 00-3-3H3m15-9l3 3m-3-3l-3 3" />
            </svg> --}}
            <img src="{{asset('assets/image/service2.png')}}" alt="" class="h-20 w-20">
          </div>
          <h3 class="text-xl font-semibold text-gray-800">Service Title</h3>
          <p class="text-gray-600 mt-2">Brief description of the service offered, highlighting key benefits.</p>
        </div>
        <!-- Service 3 -->
        <div class="bg-gray-100 shadow-xs rounded-lg p-6 text-center">
          <div class="mb-4 flex justify-center">
            <!-- Replace this with an icon or image -->
            {{-- <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v5m6-5v5m-9-6h12m-6-4V4m0 0l3 3m-3-3l-3 3" />
            </svg> --}}
            <img src="{{asset('assets/image/service3.png')}}" alt="" class="h2- w-20">
          </div>
          <h3 class="text-xl font-semibold text-gray-800">Service Title</h3>
          <p class="text-gray-600 mt-2">Brief description of the service offered, highlighting key benefits.</p>
        </div>
        <!-- Service 4 -->
        <div class="bg-gray-100 shadow-xs rounded-lg p-6 text-center">
          <div class="mb-4 flex justify-center">
            <!-- Replace this with an icon or image -->
            {{-- <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4m0 0c2.21 0 4-1.79 4-4s-1.79-4-4-4m0 0V4m0 16v-4m0-12L8 8m4-4l4 4" />
            </svg> --}}
            <img src="{{asset('assets/image/service4.png')}}" alt="" class="h-20 w-20">
          </div>
          <h3 class="text-xl font-semibold text-gray-800">Service Title</h3>
          <p class="text-gray-600 mt-2">Brief description of the service offered, highlighting key benefits.</p>
        </div>
      </div>
    </div>
  </section>
  {{-- contact --}}
  {{-- <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Map Section -->
          <div>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7750.13589289016!2d100.588101!3d13.774776!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29fa9deab904f%3A0x12df2b85cc4e2efd!2zZVdoZWVscyDguKPguLHguIrguJTguLLguKDguLTguYDguKnguIE!5e0!3m2!1sen!2sth!4v1733982193495!5m2!1sen!2sth"
              width="100%"
              height="350"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="rounded-lg shadow-sm"
              aria-label="Google Maps location of eWheels Ratchada-Huai Khwang"
            ></iframe>
          </div>
  
          <!-- Contact Information Section -->
          <div class="flex flex-col justify-center">
            <h3 class="text-2xl font-bold text-[#75CDD8] mb-4">Contact Us</h3>
  
            <address class="not-italic text-gray-700 space-y-2">
              <p>
                <strong>eWheels Ratchada-Huai Khwang</strong><br>
                Ratchada – Bangkok Head Office<br>
                Meng Jai Intersection, Meng Jai
              </p>
              <p>
                <strong>Phone:</strong>
                <a href="tel:0865544996" class="text-[#75CDD8] hover:underline">086-5544-996</a>
              </p>
              <p>
                <strong>Line ID:</strong>
                <a href="https://line.me/R/ti/p/@ew01" target="_blank" rel="noopener noreferrer" class="text-[#75CDD8] hover:underline">@ew01</a>
              </p>
              <p>
                <strong>Open:</strong> 9:00 AM – 6:00 PM
              </p>
            </address>
  
            <!-- Social Media Icons -->
            <div class="mt-4 flex space-x-4">
              <a href="#" target="_blank" class="text-gray-700 hover:text-blue-600" aria-label="Facebook">
                <i class="ri-facebook-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-blue-400" aria-label="Twitter">
                <i class="ri-twitter-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-pink-600" aria-label="Instagram">
                <i class="ri-instagram-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-red-600" aria-label="YouTube">
                <i class="ri-youtube-fill text-2xl"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <section id="contact" class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <h2 class="text-3xl font-bold text-center text-[#3f7177] mb-8">Contact Us</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-[white]">
        <!-- Office Information -->
        <div class=" rounded-lg p-6">
          <h3 class="text-xl font-semibold text-[#75CDD8] mb-4">eWheels Ratchada-Huai Khwang</h3>
          <p class="text-gray-600">
            <strong>Address:</strong><br>
            Ratchada – Bangkok Head Office<br>
            Meng Jai Intersection, Meng Jai
          </p>
          <p class="mt-4 text-gray-600">
            <strong>Phone:</strong> <a href="tel:0865544996" class="text-[#75CDD8] hover:underline">086-5544-996</a>
          </p>
          <p class="mt-2 text-gray-600">
            <strong>Line ID:</strong> <a href="https://line.me/R/ti/p/%40ew01" target="_blank" class="text-[#75CDD8] hover:underline">@ew01</a>
          </p>
          <p class="mt-4 text-gray-600">
            <strong>Opening Hours:</strong><br> 
            9:00 AM – 6:00 PM
          </p>

            <!-- Social Media Icons -->
            <div class="mt-4 flex space-x-4">
              <a href="#" target="_blank" class="text-gray-700 hover:text-blue-600" aria-label="Facebook">
                <i class="ri-facebook-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-blue-400" aria-label="Twitter">
                <i class="ri-twitter-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-pink-600" aria-label="Instagram">
                <i class="ri-instagram-fill text-2xl"></i>
              </a>
              <a href="#" target="_blank" class="text-gray-700 hover:text-red-600" aria-label="YouTube">
                <i class="ri-youtube-fill text-2xl"></i>
              </a>
            </div>
        </div>
  
      {{-- map --}}
        <div>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7750.13589289016!2d100.588101!3d13.774776!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29fa9deab904f%3A0x12df2b85cc4e2efd!2zZVdoZWVscyDguKPguLHguIrguJTguLLguKDguLTguYDguKnguIE!5e0!3m2!1sen!2sth!4v1733982193495!5m2!1sen!2sth"
              width="100%"
              height="350"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
              class="rounded-lg shadow-sm"
              aria-label="Google Maps location of eWheels Ratchada-Huai Khwang"
            ></iframe>
          </div>
      </div>
    </div>
  </section>
  

@endsection
