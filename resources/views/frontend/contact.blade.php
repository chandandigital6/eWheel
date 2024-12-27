@extends('components.main')
@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Heading Section -->
      <div class="text-center mb-12">
        @forelse ($contacts as $con)
        <h2 class="text-4xl font-extrabold text-gray-900">{{ $con->con_title }}</h2>
        {{-- <p class="mt-4 text-lg text-gray-600"></p> --}}
        @empty
         no title    
        @endforelse
        
      </div>
  
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Contact Form Section -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold text-gray-900 mb-6">Send Us a Message</h3>
          <form action="#" method="POST">
            <!-- Full Name -->
            <div class="mb-4">
              <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
              <input type="text" id="fullName" name="fullName" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
      
            <!-- Email Address -->
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
              <input type="email" id="email" name="email" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
      
            <!-- Phone Number -->
            <div class="mb-4">
              <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
              <input type="tel" id="phone" name="phone" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
      
            <!-- Select Model -->
            <div class="mb-4">
              <label for="model" class="block text-sm font-medium text-gray-700">Select Model</label>
              <select id="model" name="model" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Select a product</option>
                <option value="model1">Model 1</option>
                <option value="model2">Model 2</option>
                <option value="model3">Model 3</option>
              </select>
            </div>
            
            
            <!-- Booking Date -->
            <div class="mb-4">
              <label for="bookingDate" class="block text-sm font-medium text-gray-700">Booking Date</label>
              <input type="date" id="bookingDate" name="bookingDate" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
      
             <!-- Message -->
             <div class="mb-4">
              <label for="text" class="block text-sm font-medium text-gray-700">Message</label>
              <input type="message" id="text" name="text" placeholder="message" required class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
              <button type="submit" class="bg-[#75CDD8] text-white py-2 px-4 rounded-md hover:bg-[#75CDD8] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Submit Booking
              </button>
            </div>
          </form>
        </div>
  
        <!-- Contact Details Section -->
       @forelse ($contacts as $contact)
       <div class="bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-2xl font-semibold text-gray-900 mb-6">{{ $contact->title }}</h3></h3>
        <div class="space-y-6">
          <!-- Address -->
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 3l-7 7-7-7M5 21h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"></path></svg>
            <p class="text-lg text-gray-700">{{ $contact->address }}</p>
          </div>

          <!-- Phone -->
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 0 0 1 1h2.268a1 1 0 0 0 .832-.445l.824-1.23a2 2 0 0 1 3.44 0l.825 1.23a1 1 0 0 0 .832.445H16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v2zM7 2v2h10V2H7zm1 16h6a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2z"></path></svg>
            <p class="text-lg text-gray-700">{{ $contact->phone }}</p></p>
          </div>

          <!-- Email -->
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7 5 7-5M3 8v8h14V8"></path></svg>
            <p class="text-lg text-gray-700">{{ $contact->email }}</p>
          </div>
        </div>
      </div>
       @empty
            no details 
       @endforelse
      </div>
    </div>
  </div>
  
@endsection