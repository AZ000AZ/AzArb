<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تجارب لا تُنسى - رحلاتي</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #ea580c, #dc2626, #be185d, #a21caf, #7c3aed);
            min-height: 100vh;
        }
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .gradient-text {
            background: linear-gradient(to right, #fff, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="text-white">
<!-- Header -->
<header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-20">

        <!-- Logo (En Sol) -->
        <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-3xl text-2xl font-bold shadow-xl transform hover:scale-105 transition cursor-pointer">
            <i class="fas fa-compass me-2"></i> رحلاتي
        </div>

        <!-- Navigation (Ortada) -->
        <nav class="hidden md:flex items-center space-x-6 space-x-reverse mx-auto">
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
<section class="text-center py-20">
    <div class="animate-bounce mb-4 text-6xl">
        <i class="fas fa-camera"></i>
    </div>
    <h1 class="text-5xl font-bold gradient-text mb-4">تجارب لا تُنسى</h1>
    <p class="text-lg max-w-xl mx-auto text-white/90 mb-8">اكتشف أنشطة فريدة يقدمها خبراء محليون في جميع أنحاء العالم</p>

    <!-- Search Container -->
    <div class="bg-white/90 rounded-3xl p-6 max-w-3xl mx-auto shadow-lg">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" placeholder="ابحث عن الوجهات" class="rounded-full p-3 text-center text-gray-800 focus:outline-none">
            <input type="date" class="rounded-full p-3 text-center text-gray-800 focus:outline-none">
            <select class="rounded-full p-3 text-center text-gray-800 focus:outline-none">
                <option>عدد الضيوف</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4+</option>
            </select>
            <button type="submit" class="bg-gradient-to-r from-orange-500 to-pink-600 hover:from-orange-600 hover:to-pink-700 text-white rounded-full p-3 font-semibold transition">🔍 ابحث</button>
        </form>
    </div>
</section>

<!-- Categories Section -->
<section class="py-12">
    <h2 class="text-center text-3xl font-bold mb-8">تصفح حسب الفئة</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 max-w-5xl mx-auto">
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-utensils text-2xl mb-2"></i>
            <span>الطعام والشراب</span>
            <span class="text-sm text-white/70">234 تجربة</span>
        </div>
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-tree text-2xl mb-2"></i>
            <span>الطبيعة</span>
            <span class="text-sm text-white/70">189 تجربة</span>
        </div>
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-mountain text-2xl mb-2"></i>
            <span>المغامرات</span>
            <span class="text-sm text-white/70">156 تجربة</span>
        </div>
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-palette text-2xl mb-2"></i>
            <span>الفنون</span>
            <span class="text-sm text-white/70">207 تجربة</span>
        </div>
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-music text-2xl mb-2"></i>
            <span>الموسيقى</span>
            <span class="text-sm text-white/70">98 تجربة</span>
        </div>
        <div class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition">
            <i class="fas fa-water text-2xl mb-2"></i>
            <span>الشواطئ</span>
            <span class="text-sm text-white/70">143 تجربة</span>
        </div>
    </div>
</section>
<!-- Featured Experiences Section -->
<section class="py-12">
    <h2 class="text-center text-3xl font-bold mb-8">التجارب المميزة</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-8 max-w-screen-2xl mx-auto px-6">
        @foreach($experiences as $experience)
            <div class="glass rounded-3xl overflow-hidden shadow-2xl hover:scale-105 transition transform duration-300">
                <img src="{{ asset($experience['image']) }}" alt="{{ $experience['title'] }}" class="w-full h-72 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">{{ $experience['title'] }}</h3>
                    <p class="text-base text-white/80 mb-2">📍 {{ $experience['location'] }}</p>
                    <p class="text-base text-white/80 mb-2">⏰ {{ $experience['duration'] }}</p>
                    <p class="text-base text-white/80 mb-4">{{ $experience['description'] }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="bg-gradient-to-r from-orange-500 to-pink-600 px-4 py-2 rounded-full text-base font-semibold">
                            {{ $experience['price'] }} ريال
                        </span>
                        <span class="text-yellow-400 text-lg">⭐ {{ $experience['rating'] }}</span>
                    </div>
                    <div class="text-sm text-white/70">مع المضيف: {{ $experience['host'] }}</div>
                </div>
            </div>
        @endforeach
    </div>
</section>




<!-- Call To Action Section -->
<section class="relative bg-gradient-to-br from-pink-600 via-purple-600 to-purple-800 overflow-hidden mt-4 pb-12" dir="rtl">
    <!-- Floating Circle -->
    <div class="absolute top-32 left-24 w-40 h-40 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-full opacity-60"></div>

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col items-center justify-center px-4">
        <!-- CTA Card -->
        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 max-w-3xl mx-auto text-center shadow-lg">
            <div class="animate-pulse mb-4">
                <i class="fas fa-bolt text-orange-400 text-4xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">اكتشف تجارب جديدة</h2>
            <p class="text-lg md:text-xl text-white/80 mb-6 max-w-2xl mx-auto leading-relaxed">
                انضم إلى آلاف المسافرين الذين عاشوا تجارب لا تُنسى
            </p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="#" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-full transition transform hover:scale-105 shadow-md flex items-center justify-center">
                    <i class="fas fa-users ml-2"></i>
                    أصبح مضيفاً
                </a>
                <a href="#" class="bg-gradient-to-r from-orange-500 to-pink-600 hover:from-orange-600 hover:to-pink-700 text-white font-semibold px-6 py-3 rounded-full transition transform hover:scale-105 shadow-md flex items-center justify-center">
                    <i class="fas fa-search ml-2"></i>
                    ابحث عن تجارب
                </a>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="mt-8 text-center">
            <div class="bg-gradient-to-r from-orange-400 to-pink-500 text-white px-4 py-2 rounded-xl text-lg font-bold inline-block mb-4 shadow">
                <i class="fas fa-compass ml-2"></i>
                رحلاتي
            </div>
            <p class="text-white/60 text-sm mb-4">© ٢٠٢٥ رحلاتي، جميع الحقوق محفوظة</p>
            <div class="flex justify-center space-x-4 space-x-reverse">
                <a href="#" class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                    <i class="fab fa-whatsapp text-green-500 text-base"></i>
                </a>
                <a href="#" class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                    <i class="fab fa-youtube text-red-500 text-base"></i>
                </a>
                <a href="#" class="w-9 h-9 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                    <i class="fab fa-twitter text-blue-500 text-base"></i>
                </a>
            </div>
        </div>
    </div>
</section>

