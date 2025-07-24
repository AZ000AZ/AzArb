<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Add New Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">Add New Property</h1>

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Property Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <!-- Location (updated to select) -->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-control" id="location" name="location" required>
                <option value="">Select Location</option>
                <option value="Istanbul">Istanbul</option>
                <option value="Antalya">Antalya</option>
                <option value="Cappadocia">Cappadocia</option>
                <option value="Izmir">Izmir</option>
                <option value="Bursa">Bursa</option>
                <option value="Trabzon">Trabzon</option>
            </select>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price per Night (SAR)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <!-- Bedrooms -->
        <div class="mb-3">
            <label for="bedrooms" class="form-label">Number of Bedrooms</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="1">
        </div>

        <!-- Bathrooms -->
        <div class="mb-3">
            <label for="bathrooms" class="form-label">Number of Bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="1">
        </div>

        <!-- Max Guests -->
        <div class="mb-3">
            <label for="max_guests" class="form-label">Maximum Guests</label>
            <input type="number" class="form-control" id="max_guests" name="max_guests" value="1">
        </div>

        <!-- Rating -->
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" value="4.5">
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="All">All</option>
                <option value="Beach">Beach</option>
                <option value="Mountain">Mountain</option>
                <option value="Urban">Urban</option>
                <option value="Historic">Historic</option>
                <option value="Tropical">Tropical</option>
            </select>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Property Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Save Property</button>
    </form>
</div>

</body>
</html>
