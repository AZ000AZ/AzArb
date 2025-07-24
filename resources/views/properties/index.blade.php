@extends('layouts.app')

@section('content')
    @section('body_class', '')
    @section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

    <!-- Floating Background Shapes -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[20%] left-[10%] w-40 h-40 bg-gradient-to-r from-pink-400 to-fuchsia-500 rounded-full opacity-10 animate-pulse"></div>
        <div class="absolute bottom-[30%] right-[8%] w-32 h-32 bg-gradient-to-r from-indigo-400 to-blue-500 rounded-[50%_20%_80%_30%/30%_60%_70%_40%] opacity-10 animate-bounce"></div>
        <div class="absolute top-[60%] left-[5%] w-24 h-24 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-10 animate-ping"></div>
    </div>

    <!-- Hero Section -->
    <section class="text-center text-white py-24 relative">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-pulse">✨ Discover the Best Stays</h1>
        <p class="text-lg md:text-xl mb-6">Book the perfect stay easily and confidently</p>
        <a href="{{ route('properties.create') }}" class="bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-3 rounded-full font-semibold hover:scale-105 transition inline-flex items-center">
            <i class="fas fa-plus me-2"></i> Add New Stay
        </a>
    </section>

    @if(session('success'))
        <div class="max-w-3xl mx-auto mb-6">
            <div class="bg-green-500 text-white text-center py-3 px-4 rounded-xl shadow-md animate-bounce">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <!-- Search Bar -->
    <section class="py-8">
        <div class="max-w-4xl mx-auto px-4">
            <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <style>
                    select option {
                        color: black;
                        background-color: white;
                    }

                    input::placeholder {
                        color: white;
                    }
                </style>

                <!-- LOCATION -->
                <select name="location" class="bg-white/10 text-white px-4 py-2 rounded-xl focus:outline-none">
                    <option value="">Select Location</option>
                    <option value="Istanbul" {{ request('location') == 'Istanbul' ? 'selected' : '' }}>Istanbul</option>
                    <option value="Antalya" {{ request('location') == 'Antalya' ? 'selected' : '' }}>Antalya</option>
                    <option value="Cappadocia" {{ request('location') == 'Cappadocia' ? 'selected' : '' }}>Cappadocia</option>
                    <option value="Izmir" {{ request('location') == 'Izmir' ? 'selected' : '' }}>Izmir</option>
                    <option value="Bursa" {{ request('location') == 'Bursa' ? 'selected' : '' }}>Bursa</option>
                    <option value="Trabzon" {{ request('location') == 'Trabzon' ? 'selected' : '' }}>Trabzon</option>
                </select>

                <!-- DATE -->
                <input
                    type="text"
                    id="datepicker"
                    name="date"
                    value="{{ request('date') }}"
                    placeholder="Select Date"
                    class="bg-white/10 text-white px-4 py-2 rounded-xl focus:outline-none"
                    readonly
                >

                <!-- GUESTS -->
                <select name="guests" class="bg-white/10 text-white px-4 py-2 rounded-xl focus:outline-none">
                    <option value="">Number of Guests</option>
                    <option value="1" {{ request('guests') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ request('guests') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ request('guests') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4+" {{ request('guests') == '4+' ? 'selected' : '' }}>4+</option>
                </select>

                <!-- BUTTON -->
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-xl hover:scale-105 transition px-4 py-3">
                    <i class="fas fa-search me-1"></i> Search
                </button>
            </form>
        </div>
    </section>

    <!-- Include Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#datepicker", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: "today"
        });
    </script>


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
                        <a href="{{ route('properties.index', ['category' => $category['name'] !== 'All' ? $category['name'] : null]) }}"
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

    <!-- Property Cards -->
    <section class="py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            @forelse($properties as $property)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden shadow-xl hover:scale-105 transition transform group">
                    @if($property->image)
                        <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="h-48 w-full object-cover group-hover:scale-110 transition">
                    @else
                        <div class="h-48 flex items-center justify-center bg-gradient-to-br from-pink-400 to-purple-500 text-white">
                            <i class="fas fa-home text-3xl"></i>
                        </div>
                    @endif
                    <div class="p-4 flex flex-col justify-between h-full">
                        <div>
                            <h3 class="text-white font-bold text-lg mb-1 truncate">{{ $property->title }}</h3>
                            <p class="text-white/70 text-sm"><i class="fas fa-map-marker-alt me-1 text-pink-400"></i> {{ $property->location }}</p>
                        </div>
                        <div class="flex justify-between items-center mt-3">
                            <span class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">{{ number_format($property->price) }} SAR/Night</span>
                            <span class="text-yellow-400 text-sm flex items-center"><i class="fas fa-star me-1"></i>{{ $property->rating ?? '4.8' }}</span>
                        </div>
                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('properties.edit', $property->id) }}" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-1 rounded-lg font-medium">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?');" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-1 rounded-lg font-medium">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-white/80 py-12">
                    <i class="fas fa-home fa-3x mb-3 text-pink-400"></i>
                    <p>No stays available at the moment</p>
                </div>
            @endforelse
        </div>

        @if($properties->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $properties->links() }}
            </div>
        @endif
    </section>

@endsection
