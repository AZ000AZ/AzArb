@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')
    <div class="max-w-xl mx-auto py-10 text-white">

        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        <!-- ✅ PROFİL DÜZENLEME FORMU -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
              class="space-y-6 p-8 rounded-xl shadow-lg bg-emerald-950/40 backdrop-blur-sm border border-white/20">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block mb-1 text-sm font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg placeholder-white/70 focus:outline-none" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-1 text-sm font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg placeholder-white/70 focus:outline-none" required>
            </div>

            <!-- Avatar -->
            <div>
                <label class="block mb-1 text-sm font-semibold">Profile Photo</label>
                <input type="file" name="avatar" accept="image/*"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg" />
                @if (auth()->user()->avatar_path)
                    <div class="mt-3">
                        <img src="{{ auth()->user()->avatar_url }}" alt="Current Avatar"
                             class="w-20 h-20 rounded-full border-2 border-white shadow">
                    </div>
                @endif
            </div>

            <button type="submit"
                    class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2 rounded-lg shadow text-white font-semibold">
                Save Changes
            </button>
        </form>

        <!-- 🔒 ŞİFRE DEĞİŞTİRME FORMU -->
        <hr class="my-8 border-white/20">

        <h2 class="text-xl font-semibold mb-4">Change Password</h2>

        <form action="{{ route('password.update') }}" method="POST"
              class="space-y-6 p-8 rounded-xl shadow-lg bg-emerald-950/40 backdrop-blur-sm border border-white/20">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-sm font-semibold">Current Password</label>
                <input type="password" name="current_password"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg placeholder-white/70" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-semibold">New Password</label>
                <input type="password" name="password"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg placeholder-white/70" required>
            </div>

            <div>
                <label class="block mb-1 text-sm font-semibold">Confirm New Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full bg-emerald-900/30 border border-white/20 text-white px-4 py-2 rounded-lg placeholder-white/70" required>
            </div>

            <button type="submit"
                    class="bg-rose-500 hover:bg-rose-600 px-6 py-2 rounded-lg shadow text-white font-semibold">
                Change Password
            </button>
        </form>

    </div>
@endsection
