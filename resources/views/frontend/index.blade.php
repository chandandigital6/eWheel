@extends('components.main')
@section('comtent')

<style>
    .swiper-pagination {
      bottom: 0;
      position: relative;
    }

    .swiper-container {
      overflow: hidden;
    }
    .swiper-pagination-bullet{
      background-color:rgb(14 211 207);
    }
    .swiper-pagination-bullet-active{
      background-color:rgb(14 211 207);
    }
</style>


    {{-- banner --}}
    <div class="h-full w-full relative" id="home">
        <!-- Background Image -->
        @foreach ($banners as $banner)


        <img src="{{asset('storage/'.$banner->image)}}" alt="Banner Image" class="w-full h-full object-cover">
        <!-- Overlay Text -->
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 text-white text-center p-4">
            <section class="text-white">
                <div class="mx-auto max-w-full px-4 py-32 lg:flex lg:h-screen lg:items-center">
                    <div class="mx-auto max-w-3xl text-center">
                        <!-- Header Title with Gradient -->
                        <h1 class="text-yellow-500 text-3xl font-extrabold text-transparent sm:text-5xl">
                            {{ $banner->title }}
                            {{-- <span class="sm:block">Increase Conversion.</span> --}}
                        </h1>

                        <!-- Description Text -->
                        <p class="mx-auto mt-4 max-w-xl sm:text-xl text-opacity-75">
                          {{ $banner->sub_title }}
                        </p>

                        <!-- Call to Action Buttons -->
                        <div class="mt-8 flex flex-wrap justify-center gap-4">
                            {{-- <a href="{{route('frontend.index')}}" class="block w-full rounded border border-green-600 bg-gradient-to-r from-green-500 to-black  px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto" href="#">
                                Get Started
                            </a> --}}

                            {{-- <a href="{{route('frontend.index')}}" class="block w-full rounded border border-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-gradient-to-r from-green-500 to-black  focus:outline-none focus:ring active:bg-green-500 sm:w-auto" href="#">
                                Learn More
                            </a> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @endforeach
    </div>

{{-- ABOUT US:::::::: --}}
<section id="about" class="py-16 bg-[#012D14]">
    <div class="container mx-auto px-6 text-center">
        @foreach ($abouts->take(1) as $about)


        <h2 class="text-4xl font-extrabold text-yellow-500 sm:text-5xl">
         {{ $about->title }}
        </h2>
        <p class="mt-4 text-lg text-white max-w-3xl mx-auto">
{!! $about->description !!}
        </p>
        @endforeach
        <div class="mt-12 grid gap-12 lg:grid-cols-3 md:grid-cols-2 mb-4">
            <!-- Card 1 -->
            @foreach ($abouts->skip(1)->take(3) as $ab)


            <div class="p-6 bg-[#012D14] text-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                {{-- <div class="flex justify-center"><img src="{{asset('storage/'.$ab->image)}}" alt="" class="h-24 w-24"></div> --}}
                <h3 class="text-2xl font-semibold text-white">{{ $ab->title }}</h3>
                <p class="mt-4 text-white">
                  {!! $ab->description !!}
                </p>
            </div>
            @endforeach
            <!-- Card 2 -->
            {{-- <div class="p-6 p-6 bg-gradient-to-r from-green-500 to-black rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-center"><img src="{{asset('image/SUSTAINBILITY.png')}}" alt="" class="h-24 w-24"></div>
                <h3 class="text-2xl font-semibold text-white">Sustainability</h3>
                <p class="mt-4 text-gray-100">
                    Our commitment to the environment is reflected in the way we manufacture and recycle batteries. We aim to create eco-friendly products that contribute to a greener planet.
                </p>
            </div> --}}

            <!-- Card 3 -->
            {{-- <div class="p-6 p-6 bg-gradient-to-r from-green-500 to-black rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex justify-center"><img src="{{asset('image/InnovatioN.png')}}" alt="" class="h-24 w-24"></div>
                <h3 class="text-2xl font-semibold text-white">Innovation</h3>
                <p class="mt-4 text-gray-100">
                    Constant innovation drives us forward. We invest in research and development to bring you the latest in battery technology, ensuring you have access to cutting-edge solutions.
                </p>
            </div> --}}
        </div>
        @foreach ($abouts->skip(4)->take(1) as $about)
        {{-- <h2 class="text-4xl font-extrabold text-green-900 sm:text-5xl">
            {{ $about->title }}
        </h2> --}}
        <span class="mt-8 text-lg text-white max-w-3xl mx-auto " style="">
            {!! $about->description !!}
        </span>
    @endforeach
    </div>
</section>
{{--
<section id="about" class="py-12  bg-gradient-to-r from-green-300 to-black-500">
  <div class="container mx-auto px-6 text-center">

  </div>
</section> --}}



   {{-- Explore Products --}}
   <div id="product" class="bg-[#012D14] py-10">
    <!-- Section Heading -->
    <div class="font-bold flex justify-center mb-8">
      <h1 class="text-4xl text-yellow-500">Explore Battery</h1>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-6 md:px-16">
      <!-- Card 1 -->

      @forelse ($products as $product)
      <article class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
        <img
          src="{{ asset('storage/'.$product->image) }}"
          alt="E-rickshaw lead-acid battery"
          class="w-full h-48 object-cover"
        />
        <div class="p-6">
          <h1 class="text-xl font-bold text-yellow-500">{{ $product->title }}</h1>
          <p class="text-[#012D14] mt-2">
           {{$product->sub_title}}
          </p>
          <button class="mt-4 px-4 py-2 bg-[#012D14] text-white rounded hover:from-green-700 hover:to-black">
           <a href="{{route('frontend.detail',$product->id)}}"> View Details</a>
          </button>
        </div>
      </article>
      @empty
        <p>no data found</p>
      @endforelse


      <!-- Card 2 -->
      {{-- <article class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
        <img
          src="{{ asset('image/e-rickshaw-battery.png') }}"
          alt="Lead-acid battery for industrial use"
          class="w-full h-48 object-cover"
        />
        <div class="p-6">
          <h1 class="text-xl font-bold text-gray-800">Industrial Lead-acid Battery</h1>
          <p class="text-gray-600 mt-2">
            High-capacity lead-acid batteries for industrial applications.
          </p>
          <button class="mt-4 px-4 py-2 bg-gradient-to-r from-green-500 to-black text-white rounded hover:from-green-700 hover:to-black">
            <a href="{{route('frontend.detail')}}">View Details</a>
          </button>
        </div>
      </article> --}}

      <!-- Card 3 -->
      {{-- <article class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105">
        <img
          src="{{ asset('image/litium.png') }}"
          alt="Lithium-ion battery for advanced applications"
          class="w-full h-48 object-cover"
        />
        <div class="p-6">
          <h1 class="text-xl font-bold text-gray-800">Lithium-ion Battery</h1>
          <p class="text-gray-600 mt-2">
            Advanced lithium-ion batteries for efficient energy storage solutions.
          </p>
          <button class="mt-4 px-4 py-2 bg-gradient-to-r from-green-500 to-black text-white rounded hover:from-green-700 hover:to-black">
           <a href="{{route('frontend.detail')}}"> View Details</a>
          </button>
        </div>
      </article> --}}
    </div>
  </div>

    {{-- Battery --}}
{{--
<div class="flex items-center justify-center bg-gradient-to-l from-green-400 to-black p-6 rounded-lg shadow-md space-x-4">
   <div class="flex justify-center gap-2">
     <!-- E-Scooter Section -->
     <article class="p-4 bg-white rounded-lg shadow-sm flex flex-col items-center text-center space-y-2 hover:shadow-lg transition-shadow">
        <svg fill="#000000" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M35.15625 5.28125C33.765625 5.28125 32.5 5.585938 31.5 6.15625C30.652344 6.640625 29.949219 7.355469 29.75 8.28125C28.859375 8.667969 27.875 9.097656 27.09375 9.4375C26.3125 9.777344 25.777344 9.992188 25.5625 10.09375C24.996094 10.367188 24.535156 10.769531 24.3125 11.3125C24.089844 11.855469 24.171875 12.484375 24.4375 12.9375C24.972656 13.84375 26.082031 14.234375 27.21875 13.96875C28.121094 13.757813 28.847656 13.230469 29.46875 12.75C30.335938 15.300781 31.265625 18.972656 31 22.28125C30.84375 24.207031 30.300781 25.894531 29.25 27.0625C28.199219 28.230469 26.632813 29 24 29C22.0625 29 20.441406 28.964844 19.875 28.53125C19.589844 28.3125 19.402344 28.039063 19.34375 27.21875C19.285156 26.398438 19.445313 25.109375 19.96875 23.28125C20.011719 23.117188 20.011719 22.945313 19.96875 22.78125C19.96875 22.78125 19.839844 22.15625 19.40625 21.53125C19.4375 21.503906 19.46875 21.496094 19.5 21.46875C19.753906 21.234375 20 20.84375 20 20.375C20 19.605469 19.75 18.855469 19.3125 18.21875C18.875 17.582031 18.171875 17 17.21875 17L2.78125 17C1.828125 17 1.125 17.582031 0.6875 18.21875C0.25 18.855469 0 19.605469 0 20.375C0 20.828125 0.222656 21.230469 0.46875 21.46875C0.714844 21.707031 0.988281 21.835938 1.28125 21.96875C1.433594 22.035156 1.609375 22.097656 1.78125 22.15625C1.058594 23.511719 0 25.980469 0 29C0 30.53125 1.089844 31.742188 2.53125 32.59375C2.871094 32.792969 3.234375 32.980469 3.625 33.15625C3.234375 34.023438 3 34.988281 3 36C3 39.855469 6.144531 43 10 43C13.855469 43 17 39.855469 17 36C17 35.917969 17.003906 35.832031 17 35.75C19.066406 35.894531 21.144531 36 23.15625 36C26.210938 36 28.847656 35.746094 31.125 35.3125C31.265625 36.136719 31.527344 36.765625 31.96875 37.21875C32.621094 37.886719 33.488281 38 34 38C34.441406 38 34.871094 37.851563 35.21875 37.65625C35.96875 40.710938 38.71875 43 42 43C45.855469 43 49 39.855469 49 36C49 34.90625 48.734375 33.863281 48.28125 32.9375C48.4375 32.90625 48.585938 32.84375 48.75 32.78125C49.113281 32.636719 49.503906 32.359375 49.71875 31.96875C49.933594 31.578125 50 31.152344 50 30.71875C50 29.289063 49.027344 27.945313 47.40625 26.875C46 25.945313 44.03125 25.234375 41.5625 25.0625C41.390625 24.523438 41.148438 24.007813 40.84375 23.5C40.84375 23.488281 40.84375 23.480469 40.84375 23.46875C39.46875 21.226563 36.472656 17.378906 34.75 12.34375C34.882813 12.351563 35.019531 12.375 35.15625 12.375C35.851563 12.375 36.433594 12.320313 36.9375 12.125C37.441406 11.929688 37.875 11.574219 38.125 11.15625C38.628906 10.316406 38.5 9.488281 38.5 8.8125C38.5 8.136719 38.628906 7.339844 38.125 6.5C37.875 6.082031 37.441406 5.726563 36.9375 5.53125C36.433594 5.335938 35.851563 5.28125 35.15625 5.28125 Z M 35.15625 7.28125C35.695313 7.28125 36.050781 7.339844 36.21875 7.40625C36.386719 7.472656 36.378906 7.488281 36.40625 7.53125C36.457031 7.617188 36.5 8.078125 36.5 8.8125C36.5 9.546875 36.457031 10.039063 36.40625 10.125C36.378906 10.167969 36.386719 10.183594 36.21875 10.25C36.050781 10.316406 35.695313 10.375 35.15625 10.375C34.074219 10.375 33.121094 10.105469 32.5 9.75C31.878906 9.394531 31.6875 9.042969 31.6875 8.8125C31.6875 8.582031 31.878906 8.230469 32.5 7.875C33.121094 7.519531 34.074219 7.28125 35.15625 7.28125 Z M 28.46875 11C28.414063 11.042969 28.433594 11.046875 28.375 11.09375C27.832031 11.519531 27.105469 11.957031 26.78125 12.03125C26.5 12.097656 26.425781 12.019531 26.34375 11.96875C26.382813 11.9375 26.339844 11.953125 26.4375 11.90625C26.472656 11.890625 27.125 11.589844 27.90625 11.25C28.074219 11.175781 28.285156 11.078125 28.46875 11 Z M 31.1875 11.28125C31.292969 11.351563 31.390625 11.4375 31.5 11.5C31.804688 11.671875 32.152344 11.8125 32.5 11.9375C34.273438 17.910156 37.867188 22.402344 39.15625 24.5C39.160156 24.507813 39.152344 24.523438 39.15625 24.53125C39.261719 24.707031 39.359375 24.886719 39.4375 25.0625C35.042969 25.507813 31.378906 28.945313 31.03125 33.3125C28.84375 33.75 26.238281 34 23.15625 34C20.839844 34 18.414063 33.882813 16.0625 33.6875C15.960938 33.660156 15.855469 33.648438 15.75 33.65625C13.15625 33.429688 10.671875 33.109375 8.53125 32.625C6.453125 32.152344 4.699219 31.515625 3.5625 30.84375C2.425781 30.171875 2 29.582031 2 29C2 25.917969 3.277344 23.515625 3.8125 22.625C5.46875 22.882813 7.558594 23 9.90625 23C12.425781 23 14.726563 22.859375 16.46875 22.5625C16.804688 22.503906 17.109375 22.445313 17.40625 22.375C17.742188 22.535156 17.925781 23.011719 17.96875 23.125C17.511719 24.832031 17.265625 26.246094 17.34375 27.34375C17.429688 28.546875 17.890625 29.539063 18.65625 30.125C20.183594 31.300781 22.160156 31 24 31C27.042969 31 29.296875 30.019531 30.75 28.40625C32.203125 26.792969 32.824219 24.667969 33 22.46875C33.328125 18.398438 32.191406 13.996094 31.1875 11.28125 Z M 2.78125 19L17.21875 19C17.246094 19 17.453125 19.078125 17.65625 19.375C17.804688 19.589844 17.855469 19.851563 17.90625 20.09375C17.886719 20.105469 17.898438 20.113281 17.875 20.125C17.542969 20.269531 16.9375 20.460938 16.15625 20.59375C14.59375 20.859375 12.34375 21 9.90625 21C7.472656 21 5.296875 20.859375 3.78125 20.59375C3.023438 20.460938 2.40625 20.296875 2.09375 20.15625C2.140625 19.90625 2.183594 19.605469 2.34375 19.375C2.546875 19.078125 2.753906 19 2.78125 19 Z M 40.40625 27.03125C43.089844 27.03125 45.035156 27.707031 46.28125 28.53125C47.527344 29.355469 48 30.363281 48 30.71875C48 30.890625 47.972656 30.921875 47.96875 30.9375C47.863281 30.964844 47.386719 30.988281 46.65625 30.96875C45.121094 30.925781 42.632813 30.875 39.59375 32.125C36.90625 33.230469 35.652344 34.355469 34.9375 35.15625C34.582031 35.558594 34.351563 35.847656 34.25 35.9375C34.148438 36.027344 34.230469 36 34 36C33.703125 36 33.550781 35.960938 33.40625 35.8125C33.261719 35.664063 33 35.226563 33 34C33 30.160156 36.402344 27.03125 40.40625 27.03125 Z M 45.34375 32.96875C45.566406 32.964844 45.761719 32.964844 45.96875 32.96875C46.613281 33.8125 47 34.855469 47 36C47 38.773438 44.773438 41 42 41C39.226563 41 37 38.773438 37 36C37 35.96875 37 35.9375 37 35.90625C37.277344 35.660156 37.664063 35.378906 38.125 35.09375C38.058594 35.382813 38 35.691406 38 36C38 38.199219 39.800781 40 42 40C44.199219 40 46 38.199219 46 36C46 34.800781 45.441406 33.734375 44.59375 33C44.84375 32.984375 45.109375 32.972656 45.34375 32.96875 Z M 5.46875 33.84375C5.785156 33.945313 6.101563 34.0625 6.4375 34.15625C6.148438 34.710938 6 35.332031 6 36C6 38.195313 7.804688 40 10 40C12.195313 40 14 38.195313 14 36C14 35.84375 13.957031 35.6875 13.9375 35.53125C14.28125 35.570313 14.621094 35.589844 14.96875 35.625C14.976563 35.75 15 35.871094 15 36C15 38.773438 12.773438 41 10 41C7.226563 41 5 38.773438 5 36C5 35.222656 5.160156 34.5 5.46875 33.84375 Z M 42 34C43.117188 34 44 34.882813 44 36C44 37.117188 43.117188 38 42 38C40.882813 38 40 37.117188 40 36C40 35.78125 40.03125 35.570313 40.09375 35.375C40.484375 35.835938 40.890625 36.269531 41.28125 36.6875C41.515625 36.988281 41.902344 37.132813 42.277344 37.054688C42.648438 36.976563 42.949219 36.691406 43.042969 36.320313C43.136719 35.953125 43.011719 35.558594 42.71875 35.3125C42.347656 34.917969 41.96875 34.472656 41.59375 34.03125C41.726563 34.003906 41.859375 34 42 34 Z M 8.4375 34.625C8.839844 34.710938 9.234375 34.796875 9.65625 34.875C9.527344 35.019531 9.410156 35.175781 9.28125 35.3125C8.988281 35.558594 8.863281 35.953125 8.957031 36.320313C9.050781 36.691406 9.351563 36.976563 9.722656 37.054688C10.097656 37.132813 10.484375 36.988281 10.71875 36.6875C11.117188 36.261719 11.515625 35.789063 11.90625 35.3125C11.914063 35.410156 11.933594 35.503906 11.96875 35.59375C11.996094 35.714844 12 35.855469 12 36C12 37.113281 11.113281 38 10 38C8.886719 38 8 37.113281 8 36C8 35.59375 8.109375 35.21875 8.3125 34.90625C8.367188 34.820313 8.410156 34.726563 8.4375 34.625Z"></path></g>
          </svg>
         <h3 class="text-lg font-medium text-gray-900">E-Scooter</h3>
       </article>

         <!-- E-Scooter Section -->
         <article class="p-4 bg-white rounded-lg shadow-sm flex flex-col items-center text-center space-y-2 hover:shadow-lg transition-shadow">
             <svg viewBox="0 0 72 72" id="emoji" xmlns="http://www.w3.org/2000/svg" fill="#000000" transform="matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="color"> <path fill="#fafaf9" d="M20.2992,19s-1.1617,18.5109,9.2929,25.5631H19S11.9026,37.4081,20.2992,19Z"></path> <polygon fill="#fafaf9" points="44 38 64.22 38 64.22 43.514 43 43.514 43 38 44 38"></polygon> <circle cx="17.0818" cy="49.5632" r="5.0001" fill="#fcfcfc"></circle> <circle cx="54.6092" cy="49.5632" r="5.0001" fill="#fcfcfc"></circle> </g> <g id="line"> <polyline fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" points="23.718 37 27.588 37 28.389 29.575"></polyline> <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.0875" d="M64.22,44.5631H19L17.4022,41.6A11.7019,11.7019,0,0,1,16,36.0458v-.7653A13.8765,13.8765,0,0,1,16.6,30.8L19,22c0-1.4712,1.5288-4,3-4l39.5557.3893A2.6638,2.6638,0,0,1,64.22,21.0531Z"></path> <line x1="45.7985" x2="25.2182" y1="48.4706" y2="48.4706" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line> <circle cx="17.0818" cy="49.5632" r="5.0001" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle> <circle cx="54.6092" cy="49.5632" r="5.0001" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle> <line x1="43" x2="43" y1="19" y2="44" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.0875"></line> <line x1="44" x2="64.2195" y1="35" y2="35" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.0875"></line> <polygon fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.0875" points="44 38 64.22 38 64.22 43.514 43 43.514 43 38 44 38"></polygon> <line x1="61" x2="62" y1="37" y2="32" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.0875"></line> <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.2992,19s-1.1617,18.5109,9.2929,25.5631"></path> <line x1="25.6419" x2="25.6419" y1="37" y2="39.7847" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line> <path d="M60.072,44.5631h0a1.0492,1.0492,0,0,1,1.0492-1.0492h4.1967a1.0493,1.0493,0,0,1,1.0492,1.0492h0a1.0492,1.0492,0,0,1-1.0492,1.0492H61.1212A1.0491,1.0491,0,0,1,60.072,44.5631Z"></path> <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18,42.5319c-2.4819-1.901-4.8514.3691-5,.4681"></path> </g> </g>
          </svg>
           <h3 class="text-lg font-medium text-gray-900">E-Scooter</h3>
         </article>


       <!-- Another Item -->
       <article class="p-4 bg-white rounded-lg shadow-sm flex flex-col items-center text-center space-y-2 hover:shadow-lg transition-shadow">
           <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#dad8d8"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 17H16M8 17C8 18.1046 7.10457 19 6 19C4.89543 19 4 18.1046 4 17M8 17C8 15.8954 7.10457 15 6 15C4.89543 15 4 15.8954 4 17M16 17C16 18.1046 16.8954 19 18 19C19.1046 19 20 18.1046 20 17M16 17C16 15.8954 16.8954 15 18 15C19.1046 15 20 15.8954 20 17M10 5V11M4 11L4.33152 9.01088C4.56901 7.58593 4.68776 6.87345 5.0433 6.3388C5.35671 5.8675 5.79705 5.49447 6.31346 5.26281C6.8993 5 7.6216 5 9.06621 5H12.4311C13.3703 5 13.8399 5 14.2662 5.12945C14.6436 5.24406 14.9946 5.43194 15.2993 5.68236C15.6435 5.96523 15.904 6.35597 16.425 7.13744L19 11M4 17H3.6C3.03995 17 2.75992 17 2.54601 16.891C2.35785 16.7951 2.20487 16.6422 2.10899 16.454C2 16.2401 2 15.9601 2 15.4V14.2C2 13.0799 2 12.5198 2.21799 12.092C2.40973 11.7157 2.71569 11.4097 3.09202 11.218C3.51984 11 4.0799 11 5.2 11H17.2C17.9432 11 18.3148 11 18.6257 11.0492C20.3373 11.3203 21.6797 12.6627 21.9508 14.3743C22 14.6852 22 15.0568 22 15.8C22 15.9858 22 16.0787 21.9877 16.1564C21.9199 16.5843 21.5843 16.9199 21.1564 16.9877C21.0787 17 20.9858 17 20.8 17H20" stroke="#000000" stroke-width="0.72" stroke-linecap="round" stroke-linejoin="round"></path> </g>
           </svg>
         <h3 class="text-lg font-medium text-gray-900">Bicycle</h3>
       </article>
   </div>
</div> --}}

{{-- slider --}}
<!-- component -->


<div id="testimonial" class="bg-no-repeat bg-cover bg-center relative h-110" style="background-image: url(https://t3.ftcdn.net/jpg/11/37/40/66/240_F_1137406643_OvLrCrhqvxD4ZIiWNcM6eyw7ucJNAj7Q.jpg);">
 <div class="absolute bg-[#012D14] opacity-75 inset-0 z-0"></div>
<div>
    <div class="min-h-100 flex justify-center md:mx-32">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center z-10">
          <!-- Left Section -->
          <div class="max-w-lg text-center sm:text-left">
            <h1 class="text-2xl mt-4 md:text-4xl font-bold text-yellow-500 tracking-tight">Testimonial</h1>
            <h2 class=" text-xl md:text-4xl font-bold text-gray-100 tracking-tight">
              What our <br class="hidden sm:block lg:hidden"> clients say about the Litho Power batteries
            </h2>
            {{-- <p class="mt-4 text-gray-300">
              Goals are just dreams with a deadline
            </p> --}}
            {{-- <div class="flex flex-row items-center space-x-3 mt-5 ml-12">
              <!-- Social Buttons -->
              <a href="#" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-2xl font-bold text-lg bg-green-600 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300">
                <svg class="w-4 fill-gray-100" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.072 9.301s1.892-.147 1.892-2.459c0-2.315-1.548-3.441-3.51-3.441H0v12.926h6.454s3.941.129 3.941-3.816c-.001-.001.171-3.21-2.323-3.21zM2.844 5.697h3.61s.878 0 .878 1.344c0 1.346-.516 1.541-1.102 1.541H2.844V5.697zm3.427 8.332H2.844v-3.455h3.61s1.308-.018 1.308 1.775c0 1.512-.977 1.669-1.491 1.68zm9.378-7.341c-4.771 0-4.767 4.967-4.767 4.967s-.326 4.941 4.767 4.941c0 0 4.243.254 4.243-3.437H17.71s.072 1.391-1.988 1.391c0 0-2.184.152-2.184-2.25h6.423c.001-.001.709-5.612-4.312-5.612zm1.941 3.886h-4.074s.266-1.992 2.182-1.992 1.892 1.992 1.892 1.992zm.507-6.414H12.98v1.594h5.117V4.16z"/>
                </svg>
              </a>
              <a href="#" target="_blank" class="w-10 h-10 flex items-center justify-center rounded-2xl font-bold text-lg bg-gray-900 hover:drop-shadow-lg cursor-pointer transition ease-in duration-300">
                <svg class="h-5 fill-gray-100" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 15.047a.846.846 0 0 1-.008.112l-.006.037-.016.072c-.003.015-.008.028-.013.042l-.022.063-.02.042c-.008.02-.018.038-.028.057l-.025.04a.769.769 0 0 1-.108.135l-.035.034a.812.812 0 0 1-.049.04l-.038.03c-.005.003-.01.008-.015.01l-9.14 6.095a.858.858 0 0 1-.954 0l-9.14-6.094-.014-.01a.807.807 0 0 1-.088-.071c-.012-.01-.023-.022-.034-.034-.015-.015-.03-.03-.043-.046a.707.707 0 0 1-.066-.09 1.038 1.038 0 0 1-.054-.096l-.019-.042a.868.868 0 0 1-.022-.063c-.005-.014-.01-.027-.013-.042-.007-.023-.01-.048-.015-.072l-.007-.037A.847.847 0 0 1 2 15.047V8.953c0-.038.003-.075.008-.112l.007-.037c.004-.024.008-.049.015-.072a.774.774 0 0 1 .145-.295.978.978 0 0 1 .029-.038l.043-.046.034-.034a.834.834 0 0 1 .088-.07c.005-.003.009-.008.014-.01l9.14-6.095a.86.86 0 0 1 .954 0l9.14 6.094c.005.003.01.008.015.01l.038.03a.839.839 0 0 1 .05.041l.034.034a.735.735 0 0 1 .108.136l.025.04.029.056.019.042.022.063c.005.014.01.027.013.042.007.023.011.048.016.072l.006.037a.834.834 0 0 1 .008.112v6.094ZM3.719 10.562v2.876L5.869 12l-2.15-1.438Zm7.422-2.088V4.465l-6.734 4.49 3.008 2.011 3.726-2.492Zm8.452.48L12.86 4.465v4.009l3.726 2.492 3.007-2.012ZM4.407 15.046l6.734 4.489v-4.009l-3.726-2.492-3.008 2.012Zm8.453.48v4.009l6.733-4.49-3.007-2.01-3.726 2.491ZM12 9.966 8.96 12 12 14.033 15.04 12 12 9.967Zm8.281 3.472v-2.876L18.131 12l2.15 1.438Z"/>
                </svg>
              </a>
            </div> --}}
          </div>

          <!-- Right Section -->
          <div class="mx-0 max-w-xl my-6 flex rounded-2xl bg-[#012D14]">
            <div class="swiper-container flex-col flex self-center">
              <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)


                <div class="swiper-slide">
                  <blockquote class="text-left">
                    <div class="relative">
                      <img src="{{asset('storage/'.$testimonial->image)}}" alt="aji" class="object-cover w-full h-80 mx-auto rounded-t-2xl"/>
                      <div class="rounded-t-2xl absolute bg-gradient-to-t from-gray-800 opacity-75 inset-0 z-0"></div>
                    </div>
                    <div class="relative m-5 p-5">
                      <p class="text-gray-100 text-xl px-5">
                       {{ $testimonial->msg }}
                      </p>
                    </div>
                  </blockquote>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>




  </div>
</div>
</div>



<section class="bg-[#012D14] py-16">
    @foreach ($missionViosions as $mv)


    <div class="max-w-7xl mx-auto px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-900">{{ $mv->title }}</h2>
        <p class="mt-4 text-lg text-gray-600">{{ $mv->sub_title }}</p>
      </div>

      <!-- Vision Section -->
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12 md:mx-32">
        <div class="text-center md:text-left">
          <h3 class="text-2xl font-semibold text-yellow-500">{{ $mv->vision }}</h3>
          <p class="mt-4 text-lg text-white">
           {!! $mv->vision_description !!}
          </p>

        </div>

        <!-- Mission Section -->
        <div class="text-center md:text-left">
          <h3 class="text-2xl font-semibold text-yellow-500">{{ $mv->mission }}</h3>
          <p class="mt-4 text-lg text-white">
      {!! $mv->mission_description !!}
        </p>
          {{-- <ul class="mt-4 list-disc pl-6 text-gray-700 space-y-2">
            <li><strong>Innovation</strong>: Continuously pushing the boundaries of e-battery technology to enhance energy efficiency, longevity, and overall performance.</li>
            <li><strong>Sustainability</strong>: Ensuring our products and processes minimize environmental impact, promoting a cleaner, more sustainable planet.</li>
            <li><strong>Quality</strong>: Delivering reliable, durable, and safe e-batteries that meet the highest standards of excellence for our customers.</li>
            <li><strong>Customer Commitment</strong>: Offering personalized, efficient solutions that cater to both consumer and industrial needs, with exceptional customer service at every step.</li>
          </ul> --}}
        </div>
      </div>
    </div>

    @endforeach
  </section>


  <section id="contact" class="bg-[#012D14] py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-white">
      <div class="text-center">
        <h2 class="text-3xl font-semibold text-yellow-500">Get in Touch</h2>
        <p class="mt-4 text-lg">Have questions or need more information? We are here to help!</p>
      </div>

      <!-- Contact Form -->
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12">
        <div class="flex flex-col justify-center">
          <h3 class="text-2xl font-semibold text-yellow-500">Contact Us</h3>
          <p class="mt-4 text-lg">Fill out the form below to reach our team.</p>
          <form action="{{ route('appointment.store') }}" method="POST" class="mt-6 space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Name Field -->
              <div>
                <label for="name" class="block text-sm font-medium">Full Name</label>
                <input type="text" id="name" name="name" required class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-green-500" />
              </div>

              <!-- Email Field -->
              <div>
                <label for="email" class="block text-sm font-medium">Email Address</label>
                <input type="email" id="email" name="email" required class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-green-500" />
              </div>


            </div>
            <div>
                <label for="number" class="block text-sm font-medium">number </label>
                <input type="number" id="number" name="number" required class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-green-500" />
              </div>
            <!-- Message Field -->
            <div>
              <label for="message" class="block text-sm font-medium">Message</label>
              <textarea id="message" name="msg" rows="4" required class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <!-- Submit Button -->
            <div>
              <button type="submit" class="w-full border border-yellow-500  hover:bg-yellow-500 text-yellow-500 hover:text-green-900 font-semibold py-3 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                Send Message
              </button>
            </div>
          </form>
        </div>

        <!-- Contact Information Section -->
        <div class="flex flex-col justify-center">
          <h3 class="text-2xl font-semibold">Our Office</h3>
          <p class="mt-4 text-lg">You can also reach us at the following address:</p>
          <div class="mt-6 text-lg">
            <p><strong>Address:</strong> 1234 E-Battery Lane, Green City, Earth</p>
            <p class="mt-2"><strong>Phone:</strong> (123) 456-7890</p>
            <p class="mt-2"><strong>Email:</strong> support@ebattery.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-container', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 8,
      autoplay: {
        delay: 8000,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1.5,
        },
        1024: {
          slidesPerView: 1,
        },
      },
    })
  })
</script>

@endsection
