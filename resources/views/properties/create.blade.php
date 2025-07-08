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

    <form action="{{ route('properties.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">عنوان الإقامة</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="مثال: فيلا مع مسبح">
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">الموقع</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="مثال: الرياض، حي النرجس">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر لكل ليلة</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="مثال: 500">
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
