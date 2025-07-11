<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>رحلاتي - الإقامات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 min-h-screen">

<!-- Floating Background Shapes -->
<div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-[20%] left-[10%] w-40 h-40 bg-gradient-to-r from-pink-400 to-fuchsia-500 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-[30%] right-[8%] w-32 h-32 bg-gradient-to-r from-indigo-400 to-blue-500 rounded-[50%_20%_80%_30%/30%_60%_70%_40%] opacity-10 animate-bounce"></div>
    <div class="absolute top-[60%] left-[5%] w-24 h-24 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full opacity-10 animate-ping"></div>
</div>

<!-- Header -->
<header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-20">

        <!-- Logo (En Sol) -->
        <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-3xl text-2xl font-bold shadow-xl transform hover:scale-105 transition cursor-pointer">
            <i class="fas fa-compass me-2"></i> رحلاتي
        </div>

        <!-- Navigation (Ortada) -->
        <nav class="hidden md:flex items-center space-x-6 space-x-reverse">
            <a href="{{ route('properties.index') }}" class="text-white font-semibold hover:bg-white/20 px-4 py-2 rounded-full transition">الإقامات</a>
            <a href="{{ route('experiences') }}" class="text-white/70 hover:text-white hover:bg-white/20 px-4 py-2 rounded-full transition">التجارب</a>
            <a href="{{ route('host') }}" class="text-white/70 hover:text-white hover:bg-white/20 px-4 py-2 rounded-full transition">أصبح مضيفاً</a>
        </nav>

        <!-- Icon Group (En Sağ) -->
        <div class="flex items-center space-x-3">
            <button class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                <i class="fas fa-user"></i>
            </button>
            <button class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                <i class="fas fa-bars"></i>
            </button>
            <button class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                <i class="fas fa-heart"></i>
            </button>
            <button class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                <i class="fas fa-globe"></i>
            </button>
        </div>

    </div>
</header>


<!-- Hero Section -->
<section class="text-center text-white py-24 relative">
    <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-pulse">✨ اكتشف أفضل الإقامات</h1>
    <p class="text-lg md:text-xl mb-6">احجز إقامة مثالية بسهولة وثقة</p>
    <a href="{{ route('properties.create') }}" class="bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-3 rounded-full font-semibold hover:scale-105 transition inline-flex items-center">
        <i class="fas fa-plus me-2"></i> إضافة إقامة جديدة
    </a>
</section>

<!-- Search Bar -->
<section class="py-8">
    <div class="max-w-4xl mx-auto px-4">
        <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" name="location" placeholder="الموقع" class="p-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/60 focus:bg-white/20 focus:border-pink-400">
            <input type="text" name="date" placeholder="التاريخ" class="p-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/60 focus:bg-white/20 focus:border-pink-400 flatpickr-date">
            <input type="text" name="guests" placeholder="عدد الضيوف" class="p-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/60 focus:bg-white/20 focus:border-pink-400">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-xl hover:scale-105 transition px-4 py-3">
                <i class="fas fa-search me-1"></i> بحث
            </button>
        </form>
    </div>
</section>

<!-- Category Filters -->
<section class="py-6">
    <div class="max-w-5xl mx-auto px-4 flex flex-wrap gap-3 justify-center">
        @php
            $categories = ['الكل', 'شاطئية', 'جبلية', 'حضرية', 'تاريخية', 'استوائية'];
            $selectedCategory = request('category', 'الكل');
        @endphp
        @foreach($categories as $category)
            <a href="{{ route('properties.index', ['category' => $category !== 'الكل' ? $category : null]) }}"
               class="px-5 py-2 rounded-full font-medium transition hover:scale-105
               {{ $selectedCategory === $category ? 'bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-lg' : 'bg-white/10 text-white hover:bg-white/20' }}">
                {{ $category }}
            </a>
        @endforeach
    </div>
</section>

<!-- Property Cards -->
<section class="py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @forelse($properties as $property)
            <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden shadow-xl hover:scale-105 transition transform group">
                @if($property->image)
                    <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}" class="h-48 w-full object-cover group-hover:scale-110 transition">
                @else
                    <div class="h-48 flex items-center justify-center bg-gradient-to-br from-pink-400 to-purple-500 text-white">
                        <i class="fas fa-home text-3xl"></i>
                    </div>
                @endif
                <div class="p-4 flex flex-col justify-between h-full">
                    <div>
                        <h3 class="text-white font-bold text-lg mb-1 truncate">{{ $property->title }}</h3>
                        <p class="text-white/70 text-sm"><i class="fas fa-map-marker-alt me-1 text-pink-400"></i> {{ $property->location }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-3">
                        <span class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">{{ number_format($property->price) }} ريال/ليلة</span>
                        <span class="text-yellow-400 text-sm flex items-center"><i class="fas fa-star me-1"></i>{{ $property->rating ?? '4.8' }}</span>
                    </div>
                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('properties.edit', $property->id) }}" class="flex-1 bg-green-500 hover:bg-green-600 text-white text-center py-1 rounded-lg font-medium">
                            <i class="fas fa-edit me-1"></i> تعديل
                        </a>
                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-1 rounded-lg font-medium">
                                <i class="fas fa-trash me-1"></i> حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-white/80 py-12">
                <i class="fas fa-home fa-3x mb-3 text-pink-400"></i>
                <p>لا توجد إقامات متاحة حالياً</p>
            </div>
        @endforelse
    </div>

    @if($properties->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $properties->links() }}
        </div>
    @endif
</section>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
<script>
    flatpickr(".flatpickr-date", {
        mode: "range",
        locale: "ar",
        dateFormat: "Y-m-d",
    });
</script>
</body>
</html>
