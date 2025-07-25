@extends('layouts.app')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

@section('content')
    <div class="max-w-4xl mx-auto py-12 text-white space-y-6">

        <h1 class="text-3xl font-bold">My Bookings</h1>
        <p class="text-white/70 mb-6">Here you can view all your reservations or bookings.</p>

        @forelse ($bookings as $booking)
            <div class="bg-white/10 backdrop-blur p-5 rounded-xl shadow space-y-2 relative">

                <!-- Delete Button -->
                <form method="POST" action="{{ route('bookings.destroy', $booking) }}"
                      class="absolute top-3 right-4"
                      onsubmit="return confirm('Are you sure you want to delete this booking?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:underline text-sm">Delete</button>
                </form>

                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-xl font-semibold">{{ $booking->service_name }}</div>
                        <div class="text-sm text-white/70">{{ $booking->location }}</div>
                    </div>
                    <div class="text-sm text-right text-white/60">
                        {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
                    </div>
                </div>

                <!-- Status Badge -->
                <div>
                    <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-semibold
                        @if ($booking->status === 'approved') bg-green-600 text-white
                        @elseif ($booking->status === 'rejected') bg-red-500 text-white
                        @else bg-yellow-400 text-black @endif">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>
        @empty
            <p class="text-white/60">You have no bookings yet.</p>
        @endforelse

    </div>
@endsection
