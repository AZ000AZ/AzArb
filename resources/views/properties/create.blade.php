<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة إقامة جديدة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">إضافة إقامة جديدة</h1>

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الإقامة</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">الموقع</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر لكل ليلة (ر.س)</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="bedrooms" class="form-label">عدد الغرف</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="1">
        </div>

        <div class="mb-3">
            <label for="bathrooms" class="form-label">عدد الحمامات</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="1">
        </div>

        <div class="mb-3">
            <label for="max_guests" class="form-label">أقصى عدد ضيوف</label>
            <input type="number" class="form-control" id="max_guests" name="max_guests" value="1">
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">التقييم</label>
            <input type="number" step="0.1" class="form-control" id="rating" name="rating" value="4.5">
        </div>

        <!-- ✅ Kategori Alanı Buraya -->
        <div class="mb-3">
            <label for="category" class="form-label">الفئة</label>
            <select name="category" id="category" class="form-control" required>
                <option value="الكل">الكل</option>
                <option value="شاطئية">شاطئية</option>
                <option value="جبلية">جبلية</option>
                <option value="حضرية">حضرية</option>
                <option value="تاريخية">تاريخية</option>
                <option value="استوائية">استوائية</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">صورة الإقامة</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">صورة الإقامة</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">حفظ الإقامة</button>
    </form>
</div>

</body>
</html>
