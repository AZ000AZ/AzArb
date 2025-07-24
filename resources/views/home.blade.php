@extends('layouts.app')

@section('content')

    @section('body_class', '')
    @section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')
    <!-- Hero Section -->
    <section class="relative py-32 text-center text-white">
        <div class="mb-6">
            <i class="fas fa-camera fa-4x animate-bounce"></i>
        </div>
        <h1 class="text-5xl md:text-7xl font-bold mb-6">Unforgettable Experiences</h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto mb-8">
            Discover unique activities offered by local hosts around the world
        </p>

        <!-- Search Box -->
        <div class="max-w-4xl mx-auto bg-white/90 rounded-3xl shadow-2xl p-6 border border-white/20">
            <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" placeholder="Where do you want to go?" class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
                <input type="date" class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
                <select class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
                    <option>Guests</option>
                    <option>1 Guest</option>
                    <option>2 Guests</option>
                    <option>3 Guests</option>
                    <option>4+ Guests</option>
                </select>
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-red-500 hover:from-pink-600 hover:to-red-600 text-white rounded-xl p-3 font-semibold transition">
                    <i class="fas fa-search ml-2"></i> Search
                </button>
            </form>
        </div>
    </section>

    <!-- Category Filters -->
    <section class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-6">
                <h3 class="text-xl font-bold text-white text-center mb-6">
                    <i class="fas fa-filter ml-2 text-cyan-400"></i>
                    Browse by Category
                </h3>

                @php
                    $categories = [
                        ['name' => 'All', 'icon' => 'fa-home', 'color' => 'from-cyan-500 to-blue-600'],
                        ['name' => 'Beach', 'icon' => 'fa-umbrella-beach', 'color' => 'from-blue-500 to-teal-600'],
                        ['name' => 'Mountain', 'icon' => 'fa-mountain', 'color' => 'from-green-500 to-emerald-600'],
                        ['name' => 'Urban', 'icon' => 'fa-building', 'color' => 'from-purple-500 to-pink-600'],
                        ['name' => 'Historic', 'icon' => 'fa-landmark', 'color' => 'from-amber-500 to-orange-600'],
                        ['name' => 'Tropical', 'icon' => 'fa-tree', 'color' => 'from-emerald-500 to-teal-600'],
                    ];
                    $selectedCategory = request('category', 'All');
                @endphp

                <div class="flex flex-wrap gap-3 justify-center">
                    @foreach($categories as $category)
                        <a href="{{ route('experiences.index', ['category' => $category['name'] !== 'All' ? $category['name'] : null]) }}"
                           class="group relative overflow-hidden px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105
                       {{ $selectedCategory === $category['name'] ? 'bg-gradient-to-r '.$category['color'].' text-white shadow-2xl' : 'bg-white/10 text-white hover:bg-white/20' }}">
                            <i class="fas {{ $category['icon'] }} inline-block w-4 h-4 ml-2"></i>
                            {{ $category['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Experiences Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Featured Experiences</h2>
                <p class="text-xl text-white/80">Discover the best carefully selected experiences</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredExperiences as $exp)
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">
                        <img src="{{ $exp['image'] }}" alt="{{ $exp['title'] }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">{{ $exp['title'] }}</h3>
                            <p class="text-white/80 mb-2">{{ $exp['description'] }}</p>
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gradient-to-r from-orange-500 to-pink-600 px-4 py-2 rounded-full font-semibold">{{ $exp['price'] }}</span>
                                <span class="text-yellow-400 text-lg">⭐ {{ $exp['rating'] }}</span>
                            </div>
                            <div class="text-white/70">{{ $exp['reviews'] }} Reviews • {{ $exp['category'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Destinations Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Top Destinations</h2>
                <p class="text-xl text-white/80">Most popular destinations among travelers</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($topDestinations as $destination)
                    <div class="group transform hover:scale-105 transition duration-500 cursor-pointer">
                        <div class="bg-gradient-to-br {{ $destination['gradient'] }} rounded-3xl p-8 text-center shadow-2xl hover:shadow-3xl transition">
                            <div class="bg-white/20 rounded-2xl p-4 mb-6 group-hover:bg-white/30 transition">
                                <i class="fas fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $destination['name'] }}</h3>
                            <p class="text-white/90">{{ $destination['properties'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
