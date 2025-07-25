@extends('layouts.app')

@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')
    <div class="max-w-3xl mx-auto py-12 text-white space-y-10">

        <h1 class="text-3xl font-bold">Account Settings</h1>
        <p class="text-white/70">Here you can update your account information, password, and preferences.</p>

        <!-- 🖼️ Profile Photo Upload -->
        <div class="bg-white/10 p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-semibold">Profile Photo</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="file" name="avatar" class="w-full bg-white/10 text-white px-4 py-2 rounded">
                <button class="bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-700 transition">
                    Upload Photo
                </button>
            </form>
        </div>

        <!-- 🔒 Change Password -->
        <div class="bg-white/10 p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-semibold">Change Password</h2>
            <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                @csrf

                <input type="password" name="current_password" placeholder="Current Password"
                       class="w-full bg-white/10 text-white px-4 py-2 rounded">
                <input type="password" name="new_password" placeholder="New Password"
                       class="w-full bg-white/10 text-white px-4 py-2 rounded">
                <input type="password" name="new_password_confirmation" placeholder="Confirm New Password"
                       class="w-full bg-white/10 text-white px-4 py-2 rounded">

                <button class="bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-700 transition">
                    Update Password
                </button>
            </form>
        </div>

        <!-- 🔔 Notification Preferences -->
        <div class="bg-white/10 p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-semibold">Notification Settings</h2>
            <div class="flex items-center space-x-4">
                <input type="checkbox" id="email_notifications" class="accent-emerald-500">
                <label for="email_notifications">Enable Email Notifications</label>
            </div>
            <div class="flex items-center space-x-4">
                <input type="checkbox" id="sms_notifications" class="accent-emerald-500">
                <label for="sms_notifications">Enable SMS Notifications</label>
            </div>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-full hover:bg-emerald-700 transition">
                Save Settings
            </button>
        </div>

        <!-- 🌐 Language Preferences -->
        <div class="bg-white/10 p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-semibold">Language Preferences</h2>
            <select class="w-full bg-white/10 backdrop-blur text-white px-4 py-2 rounded">
                <option>English</option>
                <option>العربية</option>
                <option>Türkçe</option>
            </select>
        </div>

        <!-- ❌ Delete Account -->
        <div class="bg-red-500/10 border border-red-500 p-6 rounded-lg space-y-4">
            <h2 class="text-xl font-semibold text-red-400">Danger Zone</h2>
            <p class="text-white/70">Once you delete your account, there is no going back. Please be certain.</p>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                <input type="password" name="password" placeholder="Confirm Password"
                       class="w-full bg-white/10 text-white px-4 py-2 rounded mb-2">
                <button class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 transition">
                    Delete Account
                </button>
            </form>
        </div>

    </div>
@endsection
