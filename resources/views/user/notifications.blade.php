@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')
    <div class="max-w-2xl mx-auto py-10 text-white space-y-6">
        <h1 class="text-3xl font-bold mb-6">Notifications</h1>
        <p class="text-lg text-white/70">All your alerts and messages will appear here.</p>

        @forelse ($notifications as $notification)
            <div class="bg-white/10 p-4 rounded-xl backdrop-blur shadow">
                <div class="font-semibold">{{ $notification->data['title'] ?? 'Notification' }}</div>
                <div class="text-sm text-white/80">{{ $notification->data['message'] ?? '' }}</div>
                <div class="text-xs text-white/50 mt-1">
                    {{ $notification->created_at->diffForHumans() }}
                </div>
            </div>
        @empty
            <p class="text-white/50 mt-4">You have no notifications.</p>
        @endforelse
    </div>
@endsection
