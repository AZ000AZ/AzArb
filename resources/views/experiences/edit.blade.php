@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')
@section('content')
    <div class="max-w-4xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-white mb-6 text-center">Edit Experience</h1>

        <form action="{{ route('experiences.update', $experience->id) }}" method="POST" enctype="multipart/form-data" class="bg-white/10 backdrop-blur-lg p-8 rounded-3xl shadow-xl">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-white font-semibold mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $experience->title) }}" required
                       class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-white font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">{{ old('description', $experience->description) }}</textarea>
            </div>

            <!-- City -->
            <div class="mb-4">
                <label for="city" class="block text-white font-semibold mb-1">City</label>
                <input type="text" name="city" id="city" value="{{ old('city', $experience->city) }}" required
                       class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-white font-semibold mb-1">Price (SAR)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $experience->price) }}" required
                       class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">
            </div>

            <!-- Category -->
            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-white font-semibold mb-1">Category</label>

                <!-- Küresel stil: option'lara özel -->
                <style>
                    select option {
                        color: black;
                        background-color: white;
                    }
                </style>

                <select name="category" id="category" required
                        class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">
                    @foreach($categories as $cat)
                        <option value="{{ $cat['name'] }}"
                            {{ old('category', $experience->category) === $cat['name'] ? 'selected' : '' }}>
                            {{ $cat['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Rating -->
            <div class="mb-4">
                <label for="rating" class="block text-white font-semibold mb-1">Rating</label>
                <input type="number" step="0.1" name="rating" id="rating" value="{{ old('rating', $experience->rating) }}"
                       class="w-full px-4 py-2 rounded-xl bg-white/20 text-white border border-white/30 focus:outline-none">
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-white font-semibold mb-1">Change Image (optional)</label>
                <input type="file" name="image" id="image"
                       class="w-full px-4 py-2 rounded-xl bg-white/20 text-white file:text-white file:bg-green-500 file:border-none border border-white/30 focus:outline-none">
                @if($experience->image)
                    <p class="text-white/70 mt-2">Current:
                        <img src="{{ asset('storage/' . $experience->image) }}" alt="Experience Image" class="w-32 mt-2 rounded-lg shadow-lg">
                    </p>
                @endif
            </div>

            <!-- Submit -->
            <div class="text-center mt-6">
                <button type="submit"
                        class="bg-gradient-to-r from-green-400 to-teal-500 text-white font-semibold px-6 py-3 rounded-full hover:scale-105 transition">
                    💾 Update Experience
                </button>
            </div>
        </form>
    </div>
@endsection
