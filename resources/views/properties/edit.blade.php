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

    <form action="{{ route('properties.update', $property->id ?? 1) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الإقامة</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $property->title ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">الموقع</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $property->location ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر لكل ليلة</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $property->price ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $property->description ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">تحديث الإقامة</button>
    </form>
</div>

</body>
</html>
