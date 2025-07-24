@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')
@section('content')
    <div class="max-w-xl mx-auto mt-10 text-white">
        <h2 class="text-2xl font-bold mb-4">Add New Service</h2>

        <form method="POST" action="{{ route('services.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full p-2 rounded text-black" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Category</label>
                <select name="category" class="w-full p-2 rounded text-black" required>
                    <option value="">-- Select Category --</option>
                    <option value="Photography">Photography</option>
                    <option value="Cooking">Cooking</option>
                    <option value="Fitness">Fitness</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Tours">Tours</option>
                    <option value="Events">Events</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Location</label>
                <select name="location" class="w-full p-2 rounded text-black" required>
                    <option value="">-- Select City --</option>
                    <option value="Istanbul">Istanbul</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Cappadocia">Cappadocia</option>
                    <option value="Izmir">Izmir</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Bursa">Bursa</option>
                    <option value="Fethiye">Fethiye</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Mardin">Mardin</option>
                    <option value="Gaziantep">Gaziantep</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Available Date</label>
                <input type="date" name="available_date" class="w-full p-2 rounded text-black">
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
@endsection
