{{-- TOP BAR --}}
<div class="bg-[#75CDD8] flex justify-center">
    Free shipping on orders above 500€
</div>
<!-- NAVBAR -->
<nav class="bg-[#f9fbfc] shadow-lg">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="{{route('home')}}"><img src="{{asset('assets/image/eWheels-logo-opt.png')}}" alt="eWheels Logo" class="h-10 w-auto rounded text-white" /></a>
        {{-- <span class="ml-3 text-xl font-semibold text-gray-800">eWheels</span> --}}
      </div>
  
      <!-- Navigation Links -->
      <ul class="hidden md:flex space-x-6 text-black">
        <li><a href="{{route('e_scooter')}}" class="hover:text-[#75CDD8] ">e-scooter</a></li>
        <li><a href="{{route('unicycle')}}" class="hover:text-[#75CDD8] ">e-unicycle</a></li>
        <li><a href="{{route('ebike')}}" class="hover:text-[#75CDD8] ">e-bike</a></li>
        <div class="relative dropdown">
            <button tabindex="0" role="button" class="btn flex items-center space-x-1">
                <span><a href="{{route('e_wheelchair')}}">e-wheelchairs</a></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul tabindex="0" class="absolute left-0 mt-2 hidden dropdown-content menu bg-base-100 rounded-box z-30 w-52 p-2 shadow bg-white">
              <li><a href="{{route('e_wheelchair')}}">Robo e-Wheelschair</a></li>
              <li><a href="{{route('e_wheelchair')}}">Robo e-wheelschair2</a></li>
            </ul>
        </div>
        <div class="relative dropdown">
            <button tabindex="0" role="button" class="btn flex items-center space-x-1">
                <span><a href="{{route('accessories')}}">Accessories</a></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul tabindex="0" class="absolute left-0 mt-2 hidden bg-white dropdown-content menu bg-base-100 rounded-box z-30 w-52 p-2 shadow">
              <li><a href="{{route('unicycle')}}">e-unicycle</a></li>
              <li><a href="{{route('ebike')}}">e-bike</a></li>
            </ul>
        </div>
        <li><a href="{{route('retail')}}" class="hover:text-[#75CDD8]">Retail</a></li>
        <li><a href="{{route('contact')}}" class="hover:text-[#75CDD8] ">Contact</a></li>
      </ul>
  
      <!-- Mobile Menu Button -->
      <button class="md:hidden text-gray-600 focus:outline-none" id="menu-button">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  
    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
      <ul class="space-y-4 px-4 py-2 bg-gray-100">
        <li><a href="{{route('e_scooter')}}" class="block text-gray-800 hover:text-[#75CDD8] ">e-scooter</a></li>
        <li><a href="{{route('unicycle')}}" class="block text-gray-800 hover:text-[#75CDD8] ">e-unicycle</a></li>
        <li><a href="{{route('ebike')}}" class="block text-gray-800 hover:text-[#75CDD8] ">e-bike</a></li>
        <li><a href="{{route('e_wheelchair')}}" class="block text-gray-800 hover:text-[#75CDD8] ">e-wheelchair</a></li>
        <li><a href="{{route('accessories')}}" class="block text-gray-800 hover:text-[#75CDD8] ">Accessories</a></li>
        <li><a href="{{route('retail')}}" class="block text-gray-800 hover:text-[#75CDD8] ">Retail</a></li>
        <li><a href="{{route('contact')}}" class="block text-gray-800 hover:text-[#75CDD8] ">Contact</a></li>
      </ul>
    </div>
  </nav>
  
  <script>
    // Toggle Mobile Menu
    document.getElementById('menu-button').addEventListener('click', function () {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });

    // Dropdown Menu Toggle
    document.querySelectorAll('.dropdown').forEach(dropdown => {
      const button = dropdown.querySelector('button');
      const menu = dropdown.querySelector('.dropdown-content');

      button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
      });

      document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target)) {
          menu.classList.add('hidden');
        }
      });
    });
  </script>