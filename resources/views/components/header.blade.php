<nav class="bg-[#012D14] w-full z-30">
  <div class="container mx-auto flex items-center justify-between px-4 py-2 md:px-24">
      <!-- Logo Section -->
      <div class="flex items-center">
          <a href="/" class="hover:opacity-90 transition-opacity duration-300">
              <a href="{{route('frontend.index')}}" class="text-white font-semibold text-xl">
                  {{-- Σ-BΛƬƬΣЯY --}}
                  <img src="{{asset('asset/img/LITHO_POWER.png')}}" alt="" class="w-20 h-20">
              </a>
          </a>
      </div>

      <!-- Mobile Toggle Button -->
      <button
          id="mobile-menu-button"
          class="md:hidden text-gray-50 hover:text-green-50 transition-colors duration-300 focus:outline-none z-20"
          onclick="toggleMenu()"
      >
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
      </button>

      <!-- Navigation Links -->
      <div
          id="mobile-menu"
          class="invisible md:visible fixed inset-0 bg-green-400 md:static md:bg-transparent z-40"
      >
          <div class="flex flex-col h-full">
              <!-- Mobile Close Button -->
              <button
                  id="mobile-menu-close"
                  class="md:hidden absolute top-4 right-4 text-gray-50 hover:text-green-50 z-50"
                  onclick="toggleMenu()"
              >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>

              <ul class="flex flex-col md:flex-row items-center justify-center md:justify-start space-y-6 md:space-y-0 md:space-x-8 p-6 md:p-0 h-full">
                  <li class="w-full md:w-auto text-center md:text-left">
                      <a href="{{route('frontend.index')}}" class="block py-2 text-lg md:text-md hover:text-green-500 transition-colors duration-300 font-light text-white">Home</a>
                  </li>
                  <li class="w-full md:w-auto text-center md:text-left">
                      <a href="#about" class="block py-2 text-md md:text-md hover:text-green-500 transition-colors duration-300 font-light text-white">About</a>
                  </li>

                  @php
                      $products=App\Models\Product::all();
                    //   print_r($products)
                  @endphp

                  <li class="w-full md:w-auto text-center md:text-left relative group">
                    <button class="w-full py-2 text-md md:text-md hover:text-green-500 transition-colors duration-300 focus:outline-none font-light text-white">
                        <a href="#product">Products</a>
                    </button>
                    <!-- Mobile Dropdown -->
                    <div class="md:absolute md:left-0 md:hidden md:group-hover:block md:w-48 md:bg-[#012D14] md:rounded-md md:shadow-lg">
                        <ul class="md:py-2 space-y-4 md:space-y-0">
                            @foreach($products as $category)
                                <li>
                                    <a href="{{ route('frontend.detail', $category->id) }}"
                                       class="block px-4 py-2 text-md hover:bg-gray-100 hover:text-green-500 font-light text-white">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                  <li class="w-full md:w-auto text-center md:text-left">
                      <a href="#testimonial" class="block py-2 text-md md:text-md hover:text-green-500 transition-colors duration-300 font-light text-white">Testimonial</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</nav>

<script>
function toggleMenu() {
  console.log("Toggle function called");
  const menu = document.getElementById('mobile-menu');
  console.log("Menu element:", menu);
  if (menu.classList.contains('invisible')) {
      menu.classList.remove('invisible');
      menu.classList.add('visible');
  } else {
      menu.classList.remove('visible');
      menu.classList.add('invisible');
  }
}

// Make sure the function exists in global scope
window.toggleMenu = toggleMenu;
</script>
