<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Edit Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $property->title }}" required>
        <input type="text" name="location" value="{{ $property->location }}">
        <input type="number" name="price" value="{{ $property->price }}" required>

        <input type="number" name="bedrooms" value="{{ $property->bedrooms }}">
        <input type="number" name="bathrooms" value="{{ $property->bathrooms }}">
        <input type="number" name="max_guests" value="{{ $property->max_guests }}">
        <input type="number" step="0.1" name="rating" value="{{ $property->rating }}">

        <!-- ✅ Category Field -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="All" {{ $property->category == 'All' ? 'selected' : '' }}>All</option>
                <option value="Beach" {{ $property->category == 'Beach' ? 'selected' : '' }}>Beach</option>
                <option value="Mountain" {{ $property->category == 'Mountain' ? 'selected' : '' }}>Mountain</option>
                <option value="Urban" {{ $property->category == 'Urban' ? 'selected' : '' }}>Urban</option>
                <option value="Historic" {{ $property->category == 'Historic' ? 'selected' : '' }}>Historic</option>
                <option value="Tropical" {{ $property->category == 'Tropical' ? 'selected' : '' }}>Tropical</option>
            </select>
        </div>

        @if($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" width="100">
        @endif
        <input type="file" name="image">

        <textarea name="description">{{ $property->description }}</textarea>

        <button type="submit">Update Property</button>
    </form>
</div>

</body>
</html>
