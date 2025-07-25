@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">New Experience</h2>
        <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="title" placeholder="Experience Title" required class="w-full p-2 mb-3 border rounded">
            <textarea name="description" placeholder="Description" required class="w-full p-2 mb-3 border rounded"></textarea>
            <input name="price" type="number" placeholder="Price" step="0.01" required class="w-full p-2 mb-3 border rounded">
            <input name="city" placeholder="City" required class="w-full p-2 mb-3 border rounded">
            <input name="rating" type="number" placeholder="Rating (optional)" step="0.1" min="0" max="5" class="w-full p-2 mb-3 border rounded">
            <select name="category" required class="w-full p-2 mb-3 border rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat['name'] }}">{{ $cat['name'] }}</option>
                @endforeach
            </select>
            <input type="file" name="image" accept="image/*" class="w-full mb-3">
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Add Experience</button>
        </form>
    </div>
@endsection
