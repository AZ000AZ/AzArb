@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-6 text-white space-y-10">

        <!-- 👤 Avatar + Kullanıcı Bilgisi -->
        <div class="flex items-center gap-6">
            <img src="{{ auth()->user()->avatar_url }}"
                 class="w-24 h-24 rounded-full border-4 border-white shadow-lg" alt="Avatar">
            <div>
                <h2 class="text-2xl font-bold">{{ auth()->user()->name }}</h2>
                <p class="text-white/70">{{ auth()->user()->email }}</p>
                <p class="text-sm text-white/50">Joined: {{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <!-- 🛠️ Profil Ayarları Butonu -->
        <a href="{{ route('profile.edit') }}"
           class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
            Edit Profile
        </a>

        <!-- 📊 İstatistik Kartları -->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 mt-6">
            <div class="bg-white/10 backdrop-blur-md p-5 rounded-xl shadow-lg text-center">
                <div class="text-3xl font-bold">{{ auth()->user()->favorites->count() }}</div>
                <div class="text-sm text-white/80 mt-1">Favorites</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-5 rounded-xl shadow-lg text-center">
                <div class="text-3xl font-bold">8</div> <!-- Gelecekte bookings sayısından alınabilir -->
                <div class="text-sm text-white/80 mt-1">Bookings</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-5 rounded-xl shadow-lg text-center">
                <div class="text-3xl font-bold">5</div> <!-- Gelecekte experiences sayısından alınabilir -->
                <div class="text-sm text-white/80 mt-1">Experiences</div>
            </div>
        </div>

    </div>
@endsection
