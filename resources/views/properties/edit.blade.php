<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل الإقامة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">تعديل الإقامة</h1>
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

        <!-- ✅ Kategori Alanı -->
        <div class="mb-3">
            <label for="category" class="form-label">الفئة</label>
            <select name="category" id="category" class="form-control" required>
                <option value="الكل" {{ $property->category == 'الكل' ? 'selected' : '' }}>الكل</option>
                <option value="شاطئية" {{ $property->category == 'شاطئية' ? 'selected' : '' }}>شاطئية</option>
                <option value="جبلية" {{ $property->category == 'جبلية' ? 'selected' : '' }}>جبلية</option>
                <option value="حضرية" {{ $property->category == 'حضرية' ? 'selected' : '' }}>حضرية</option>
                <option value="تاريخية" {{ $property->category == 'تاريخية' ? 'selected' : '' }}>تاريخية</option>
                <option value="استوائية" {{ $property->category == 'استوائية' ? 'selected' : '' }}>استوائية</option>
            </select>
        </div>

        @if($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" width="100">
        @endif
        <input type="file" name="image">
        @if($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" width="100">
        @endif
        <input type="file" name="image">

        <textarea name="description">{{ $property->description }}</textarea>

        <button type="submit">تحديث الإقامة</button>
    </form>
