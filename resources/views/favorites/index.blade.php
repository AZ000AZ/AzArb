@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')
@section('content')
    <div class="max-w-4xl mx-auto py-10 text-white">
        <h1 class="text-3xl font-bold mb-6">Your Favorite Items</h1>

        @if ($favorites && count($favorites))
            <ul class="space-y-4">
                @foreach ($favorites as $item)
                    <li class="bg-white/10 p-4 rounded-md">{{ $item->title ?? 'Unnamed Favorite' }}</li>
                @endforeach
            </ul>
        @else
            <p>No favorites found.</p>
        @endif
    </div>
@endsection
