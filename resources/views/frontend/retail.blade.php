@extends('components.main')
@section('content')
<div class="container mx-auto p-5">
    <div class="locator-header flex items-center gap-3">
        <button id="myLocation" class="px-4 py-2 border border-blue-600 text-black rounded hover:border-blue-700">
            &#x1F4CD; My Location
        </button>
        <input 
            type="text" 
            id="addressInput" 
            placeholder="Enter an address" 
            class="flex-1 px-4 py-2 border border-gray-300 rounded"
        >
    </div>

    <div class="filters my-5">
        <label class="mr-4"><input type="checkbox" id="norway" class="mr-1"> Norway (16)</label>
        <label class="mr-4"><input type="checkbox" id="sweden" class="mr-1"> Sweden (2)</label>
        <label class="mr-4"><input type="checkbox" id="switzerland" class="mr-1"> Switzerland (2)</label>
    </div>

    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945747.1774141216!2d99.27882546724555!3d15.033245389388414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304d8df747424db1%3A0x9ed72c880757e802!2sThailand!5e0!3m2!1sen!2sin!4v1733988236669!5m2!1sen!2sin" 
        class="w-full h-[450px] border-none" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>



<div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:mx-24 mb-4 m-4">
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Alnabru</h3>
        <p>Professor Birkelands vei 34 B, 1081 Oslo</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Bergen</h3>
        <p>Myrdalsvegen 22, 5131 Nyborg</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Göteborg</h3>
        <p>Datavägen 31, 436 32 Askim, Sverige</p>
        <a href="https://www.ehwheels.se" class="text-blue-600 hover:underline">www.ehwheels.se</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Lugano</h3>
        <p>Corso Elvezia 1, Lugano, Sveits</p>
        <a href="https://www.ehwheels.ch" class="text-blue-600 hover:underline">www.ehwheels.ch</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Oslo Sentrum</h3>
        <p>Akersgata 18, 0158 Oslo, Norge</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Oslo Sentrum</h3>
        <p>Akersgata 18, 0158 Oslo, Norge</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Lugano</h3>
        <p>Corso Elvezia 1, Lugano, Sveits</p>
        <a href="https://www.ehwheels.ch" class="text-blue-600 hover:underline">www.ehwheels.ch</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Oslo Sentrum</h3>
        <p>Akersgata 18, 0158 Oslo, Norge</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Lugano</h3>
        <p>Corso Elvezia 1, Lugano, Sveits</p>
        <a href="https://www.ehwheels.ch" class="text-blue-600 hover:underline">www.ehwheels.ch</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Oslo Sentrum</h3>
        <p>Akersgata 18, 0158 Oslo, Norge</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Lugano</h3>
        <p>Corso Elvezia 1, Lugano, Sveits</p>
        <a href="https://www.ehwheels.ch" class="text-blue-600 hover:underline">www.ehwheels.ch</a>
    </div>
    <div class="border p-4 rounded shadow">
        <h3 class="text-lg font-semibold">E-Wheels Oslo Sentrum</h3>
        <p>Akersgata 18, 0158 Oslo, Norge</p>
        <a href="https://www.e-wheels.no" class="text-blue-600 hover:underline">www.e-wheels.no</a>
    </div>

</div>    
@endsection