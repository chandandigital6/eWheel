@extends('components.main')
@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Heading Section -->
      <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900">Contact Us</h2>
        <p class="mt-4 text-lg text-gray-600">We'd love to hear from you! Get in touch with us for any questions, feedback, or inquiries.</p>
      </div>
  
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Contact Form Section -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold text-gray-900 mb-6">Send Us a Message</h3>
          <form action="#" method="POST">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div class="flex flex-col">
                <label for="first-name" class="text-gray-700">First Name</label>
                <input type="text" id="first-name" name="first-name" class="mt-2 p-3 border border-gray-300 rounded-lg" required>
              </div>
              <div class="flex flex-col">
                <label for="last-name" class="text-gray-700">Last Name</label>
                <input type="text" id="last-name" name="last-name" class="mt-2 p-3 border border-gray-300 rounded-lg" required>
              </div>
            </div>
  
            <div class="flex flex-col mt-6">
              <label for="email" class="text-gray-700">Email Address</label>
              <input type="email" id="email" name="email" class="mt-2 p-3 border border-gray-300 rounded-lg" required>
            </div>
  
            <div class="flex flex-col mt-6">
              <label for="message" class="text-gray-700">Your Message</label>
              <textarea id="message" name="message" rows="4" class="mt-2 p-3 border border-gray-300 rounded-lg" required></textarea>
            </div>
  
            <button type="submit" class="mt-6 w-full py-3 px-6 border border-blue-600 text-black font-semibold rounded-lg hover:border-blue-700 transition-all">
              Send Message
            </button>
          </form>
        </div>
  
        <!-- Contact Details Section -->
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h3 class="text-2xl font-semibold text-gray-900 mb-6">Our Contact Information</h3>
          <div class="space-y-6">
            <!-- Address -->
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 3l-7 7-7-7M5 21h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z"></path></svg>
              <p class="text-lg text-gray-700">1234 Green Street, City, Country</p>
            </div>
  
            <!-- Phone -->
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 0 0 1 1h2.268a1 1 0 0 0 .832-.445l.824-1.23a2 2 0 0 1 3.44 0l.825 1.23a1 1 0 0 0 .832.445H16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v2zM7 2v2h10V2H7zm1 16h6a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2z"></path></svg>
              <p class="text-lg text-gray-700">+1 (800) 123-4567</p>
            </div>
  
            <!-- Email -->
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true" role="img"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7 5 7-5M3 8v8h14V8"></path></svg>
              <p class="text-lg text-gray-700">support@example.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection