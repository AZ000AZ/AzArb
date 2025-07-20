<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>تجارب لا تُنسى - رحلاتي</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-pink-600 to-red-600">
<script src="https://unpkg.com/alpinejs" defer></script>

<!-- Header -->
<header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="bg-white/20 backdrop-blur-sm text-white px-6 py-3 rounded-2xl text-2xl font-bold hover:bg-white/30 transition cursor-pointer">
                <i class="fas fa-compass ml-2"></i> رحلاتي
            </div>


            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8 space-x-reverse">
                <a href="{{ route('home') }}"
                   class="px-4 py-2 rounded-full font-medium transition
       {{ request()->routeIs('home') ? 'bg-gradient-to-r from-pink-500 to-red-500 text-white shadow-lg' : 'text-white/80 hover:text-white' }}">
                    الصفحة الرئيسية</a>
                <a href="{{ route('properties.index') }}" class="text-white/80 hover:text-white font-medium transition">الإقامات</a>
                <a href="{{ route('experiences.index') }}" class="text-white/80 hover:text-white font-medium transition">التجارب</a>
                <a href="{{ route('host') }}" class="text-white/80 hover:text-white font-medium transition">أصبح مضيفاً</a>
            </nav>



            <!-- Icons -->
            <div class="flex items-center space-x-3">
                <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <i class="fas fa-globe"></i>
                </button>
                <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <i class="fas fa-heart"></i>
                </button>
                <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <i class="fas fa-user"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="relative py-32 text-center text-white">
    <div class="mb-6">
        <i class="fas fa-camera fa-4x animate-bounce"></i>
    </div>
    <h1 class="text-5xl md:text-7xl font-bold mb-6">تجارب لا تُنسى</h1>
    <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto mb-8">
        اكتشف أنشطة فريدة يقدمها مضيفون محليون في جميع أنحاء العالم
    </p>
    <!-- Search Box -->
    <div class="max-w-4xl mx-auto bg-white/90 rounded-3xl shadow-2xl p-6 border border-white/20">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" placeholder="أين تريد الذهاب؟" class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
            <input type="date" class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
            <select class="w-full p-3 rounded-xl text-center focus:outline-none text-black">
                <option>عدد الضيوف</option>
                <option>١ ضيف</option>
                <option>٢ ضيوف</option>
                <option>٣ ضيوف</option>
                <option>٤+ ضيوف</option>
            </select>
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-red-500 hover:from-pink-600 hover:to-red-600 text-white rounded-xl p-3 font-semibold transition">
                <i class="fas fa-search ml-2"></i> بحث
            </button>
        </form>
    </div>
</section>




<!-- Category Filters -->
<section class="py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-6">
            <h3 class="text-xl font-bold text-white text-center mb-6">
                <i class="fas fa-filter ml-2 text-cyan-400"></i>
                تصفح حسب الفئة
            </h3>
            @php
                $categories = [
                    ['name' => 'الكل', 'icon' => 'fa-home', 'color' => 'from-cyan-500 to-blue-600'],
                    ['name' => 'شاطئية', 'icon' => 'fa-umbrella-beach', 'color' => 'from-blue-500 to-teal-600'],
                    ['name' => 'جبلية', 'icon' => 'fa-mountain', 'color' => 'from-green-500 to-emerald-600'],
                    ['name' => 'حضرية', 'icon' => 'fa-building', 'color' => 'from-purple-500 to-pink-600'],
                    ['name' => 'تاريخية', 'icon' => 'fa-landmark', 'color' => 'from-amber-500 to-orange-600'],
                    ['name' => 'استوائية', 'icon' => 'fa-tree', 'color' => 'from-emerald-500 to-teal-600'],
                ];
                $selectedCategory = request('category', 'الكل');
            @endphp

            <div class="flex flex-wrap gap-3 justify-center">
                @foreach($categories as $category)
                    <a href="{{ route('properties.index', ['category' => $category['name'] !== 'الكل' ? $category['name'] : null]) }}"
                       class="group relative overflow-hidden px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105
                       {{ $selectedCategory === $category['name'] ? 'bg-gradient-to-r '.$category['color'].' text-white shadow-2xl' : 'bg-white/10 text-white hover:bg-white/20' }}">
                        <i class="fas {{ $category['icon'] }} inline-block w-4 h-4 ml-2"></i>
                        {{ $category['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">التجارب المميزة</h2>
            <p class="text-xl text-white/80">اكتشف أفضل التجارب المختارة بعناية</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredExperiences as $exp)
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden shadow-xl hover:scale-105 transition duration-300">
                    <img src="{{ $exp['image'] }}" alt="{{ $exp['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $exp['title'] }}</h3>
                        <p class="text-white/80 mb-2">{{ $exp['description'] }}</p>
                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-gradient-to-r from-orange-500 to-pink-600 px-4 py-2 rounded-full font-semibold">{{ $exp['price'] }}</span>
                            <span class="text-yellow-400 text-lg">⭐ {{ $exp['rating'] }}</span>
                        </div>
                        <div class="text-white/70">{{ $exp['reviews'] }} تقييمات • {{ $exp['category'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Top Destinations Section -->

<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-white mb-4">أفضل الوجهات</h2>
            <p class="text-xl text-white/80">الوجهات الأكثر شعبية لدى المسافرين</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($topDestinations as $destination)
                <div class="group transform hover:scale-105 transition duration-500 cursor-pointer">
                    <div class="bg-gradient-to-br {{ $destination['gradient'] }} rounded-3xl p-8 text-center shadow-2xl hover:shadow-3xl transition">
                        <div class="bg-white/20 rounded-2xl p-4 mb-6 group-hover:bg-white/30 transition">
                            <i class="fas fa-map-marker-alt fa-2x text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $destination['name'] }}</h3>
                        <p class="text-white/90">{{ $destination['properties'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-black/20 backdrop-blur-lg border-t border-white/20 py-8 text-center text-white">
    <div class="flex justify-center mb-4">
        <div class="bg-white/20 px-6 py-3 rounded-2xl text-2xl font-bold">
            <i class="fas fa-compass ml-2"></i> رحلاتي
        </div>
    </div>
    <p class="text-white/70 mb-4">منصة السفر الأولى في العالم العربي</p>
    <div class="flex justify-center gap-4 mb-4">
        <a href="#" class="text-white/60 hover:text-white"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="#" class="text-white/60 hover:text-white"><i class="fab fa-twitter fa-lg"></i></a>
        <a href="#" class="text-white/60 hover:text-white"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="#" class="text-white/60 hover:text-white"><i class="fab fa-youtube fa-lg"></i></a>
    </div>
    <p class="text-white/50">© ٢٠٢٥ رحلاتي. جميع الحقوق محفوظة.</p>
</footer>

</body>
</html>
