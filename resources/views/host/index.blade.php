@extends('layouts.app')

@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')

    <!-- Floating Background Shapes -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[20%] left-[10%] w-40 h-40 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full opacity-10 animate-pulse"></div>
        <div class="absolute bottom-[30%] right-[8%] w-32 h-32 bg-gradient-to-r from-green-400 to-emerald-500 rounded-[50%_20%_80%_30%/30%_60%_70%_40%] opacity-10 animate-bounce"></div>
        <div class="absolute top-[60%] left-[5%] w-24 h-24 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full opacity-10 animate-ping"></div>
    </div>

    <!-- Hero Section -->
    <section class="relative py-24 text-center text-white">
        <div class="max-w-3xl mx-auto px-4">
            <div class="animate-bounce mb-8">
                <i data-feather="rocket" class="w-16 h-16 text-emerald-400 mx-auto"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Start Your Hosting Journey</h1>
            <p class="text-lg md:text-xl mb-8">
                Share your space with travelers from around the world and earn extra income
            </p>
        </div>
    </section>

    <!-- Search Form -->
    <div class="glass-effect rounded-3xl p-4 shadow-2xl max-w-5xl mx-auto mb-8 border border-white/30">
        <form action="{{ route('host') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4">
            <div class="flex-1 px-3 py-2 border-l border-white/20">
                <div class="text-xs text-white/80 mb-1 font-semibold">Location</div>
                <select name="location" class="w-full bg-white text-black text-sm border border-white/30 outline-none rounded-full px-3 py-2">
                    <option value="">All Locations</option>
                    <option value="Istanbul">Istanbul</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Cappadocia">Cappadocia</option>
                    <option value="Izmir">Izmir</option>
                    <option value="Bodrum">Bodrum</option>
                    <option value="Fethiye">Fethiye</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Mardin">Mardin</option>
                </select>
            </div>

            <div class="flex-1 px-3 py-2 border-l border-white/20">
                <div class="text-xs text-white/80 mb-1 font-semibold">Date</div>
                <input type="date" name="date" class="w-full bg-transparent text-white text-sm border-none outline-none">
            </div>

            <div class="flex-1 px-3 py-2">
                <div class="text-xs text-white/80 mb-1 font-semibold">Service Type</div>
                <select name="category" class="w-full bg-white text-black text-sm border border-white/30 outline-none rounded-full px-3 py-2">
                    <option value="">All Services</option>
                    <option value="Photography">Photography</option>
                    <option value="Cooking">Cooking</option>
                    <option value="Fitness">Fitness</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Tours">Tours</option>
                    <option value="Events">Events</option>
                </select>
            </div>

            <button type="submit" class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-full h-12 w-12 flex items-center justify-center hover:scale-110 transition">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Add Service Button -->
    <div class="flex justify-center mb-8">
        <a href="{{ route('services.create') }}"
           class="inline-block bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold px-6 py-3 rounded-full hover:scale-105 transition">
            + Add New Service
        </a>
    </div>

    <!-- Services Section -->
    <section class="py-16 bg-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-white mb-8">
                Available Services{{ request('location') ? ' in ' . request('location') : '' }}
            </h2>

            <div class="flex overflow-x-auto space-x-4 pb-6">
                @foreach ($services->pluck('category')->unique() as $category)
                    <a href="{{ route('host', ['category' => $category]) }}"
                       class="min-w-fit bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold px-6 py-3 rounded-full hover:scale-105 transition {{ request('category') == $category ? 'ring-2 ring-white' : '' }}">
                        {{ $category }}
                    </a>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($services as $service)
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl overflow-hidden hover:scale-105 transition cursor-pointer">
                        <img src="https://source.unsplash.com/400x300/?{{ $service->category }}" class="w-full h-48 object-cover">
                        <div class="p-4 text-white">
                            <h3 class="font-bold text-lg mb-1">{{ $service->name }}</h3>
                            <p class="text-sm text-white/70">Category: {{ $service->category }}</p>
                            <div class="flex items-center justify-between mt-3 text-sm text-white/60">
                                <span><i class="fas fa-map-marker-alt"></i> {{ $service->location }}</span>
                                <span><i class="fas fa-calendar"></i> {{ $service->available_date }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
