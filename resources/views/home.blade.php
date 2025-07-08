<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سفرنا - اكتشف عالمك</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animated-gradient {
            background: linear-gradient(-45deg, #7c3aed, #2563eb, #06b6d4, #a855f7);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        .fade-in { opacity: 0; animation: fadeIn 1.5s ease-out forwards; }
        @keyframes fadeIn { to { opacity: 1; } }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-100 min-h-screen fade-in">

<!-- Header -->

<header class="bg-white/80 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 py-2 rounded-2xl text-2xl font-bold shadow-lg">
                سفرنا
            </div>

            <!-- Navigation -->

            <div class="hidden md:flex items-center space-x-8 space-x-reverse">
                <a href="#" class="text-gray-700 hover:text-purple-600 font-medium">الإقامات</a>
                <a href="{{ route('experiences') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors">التجارب</a>
                <a href="#" class="text-gray-700 hover:text-purple-600 font-medium">أصبح مضيفاً</a>
            </div>


            <!-- Right Side -->
            <div class="flex items-center space-x-4 space-x-reverse">
                <!-- Language Button -->
                <button class="hidden md:flex items-center space-x-2 space-x-reverse px-3 py-2 rounded-md hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 3C7.032 3 3 7.032 3 12s4.032 9 9 9 9-4.032 9-9-4.032-9-9-9zm0 2a7 7 0 016.92 6H5.08A7 7 0 0112 5zm0 14a7 7 0 01-6.92-6h13.84A7 7 0 0112 19z" />
                    </svg>
                    <span class="text-gray-700 text-sm font-medium">العربية</span>
                </button>

                <!-- Favorites Button -->
                <button class="p-2 rounded-full hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42
                            4.42 3 7.5 3c1.74 0 3.41.81 4.5
                            2.09C13.09 3.81 14.76 3 16.5
                            3 19.58 3 22 5.42 22 8.5c0
                            3.78-3.4 6.86-8.55 11.54L12
                            21.35z" />
                    </svg>
                </button>

                <!-- Notifications Button -->
                <button class="p-2 rounded-full hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 17h5l-1.405-1.405C18.79
                            14.79 18 13.42 18 12V8c0-3.314-2.686-6-6-6S6
                            4.686 6 8v4c0 1.42-.79 2.79-1.595
                            3.595L3 17h5m4 0v1a3 3 0 01-6
                            0v-1h6z" />
                    </svg>
                </button>

                <!-- User Menu -->
                <div class="flex items-center bg-white border-2 border-gray-200 rounded-full py-2 px-3 hover:shadow-xl transition cursor-pointer hover:border-purple-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879
                                1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-blue-600 to-indigo-700 opacity-80 animate-pulse"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">اكتشف عالمك</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto leading-relaxed mb-6">رحلات استثنائية تنتظرك في أجمل الوجهات حول العالم</p>
            <input type="text" placeholder="ابحث عن الوجهات" class="w-full md:w-1/2 p-3 rounded-2xl text-center text-black placeholder-gray-400 border-2 border-white/50 focus:border-purple-400 transition">
            <button class="mt-4 px-8 py-3 rounded-full bg-gradient-to-r from-purple-600 to-blue-600 text-white font-semibold shadow-lg hover:from-purple-700 hover:to-blue-700 transition transform hover:scale-105">ابحث الآن</button>
        </div>
    </div>
</section>
<!-- Experience Categories -->
<section class="py-16 bg-white/50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">اختر تجربتك المثالية</h2>
            <p class="text-xl text-gray-600">اكتشف عالماً من الإمكانيات اللامحدودة</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            @foreach([
                ['name' => 'الشواطئ الساحرة', 'icon' => '🌊', 'color' => 'from-blue-400 to-cyan-400'],
                ['name' => 'الجبال الشاهقة', 'icon' => '🏔️', 'color' => 'from-green-400 to-emerald-400'],
                ['name' => 'المدن العصرية', 'icon' => '🏙️', 'color' => 'from-purple-400 to-pink-400'],
                ['name' => 'الطبيعة الخلابة', 'icon' => '🌲', 'color' => 'from-green-500 to-teal-400'],
                ['name' => 'الجزر الاستوائية', 'icon' => '🏝️', 'color' => 'from-orange-400 to-red-400'],
                ['name' => 'القلاع التاريخية', 'icon' => '🏰', 'color' => 'from-amber-400 to-orange-400'],
                ['name' => 'مغامرات التخييم', 'icon' => '⛺', 'color' => 'from-indigo-400 to-purple-400'],
                ['name' => 'جولات التصوير', 'icon' => '📷', 'color' => 'from-pink-400 to-rose-400'],
                ['name' => 'تجارب الطعام', 'icon' => '🍽️', 'color' => 'from-yellow-400 to-orange-400'],
                ['name' => 'الفعاليات الموسيقية', 'icon' => '🎵', 'color' => 'from-violet-400 to-purple-400'],
            ] as $category)
                <div class="group cursor-pointer transform hover:scale-105 transition-all duration-300">
                    <div class="bg-gradient-to-br {{ $category['color'] }} rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4 mb-4 group-hover:bg-white/30 transition-colors text-3xl">
                                {{ $category['icon'] }}
                            </div>
                            <span class="text-white font-semibold text-sm leading-tight">{{ $category['name'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Destinations -->
<section class="py-16 bg-white/50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">وجهات مميزة</h2>
        <p class="text-xl text-gray-600 mb-8">اكتشف أجمل الأماكن المختارة بعناية لتجربة إقامة لا تُنسى</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['name' => 'فيلا فاخرة في دبي', 'location' => 'دبي، الإمارات', 'price' => '٨٥٠'],
                ['name' => 'شاليه جبلي في لبنان', 'location' => 'جبال لبنان', 'price' => '٢٨٠'],
                ['name' => 'بيت تراثي في المغرب', 'location' => 'مراكش، المغرب', 'price' => '١٩٠'],
            ] as $destination)
                <div class="bg-white rounded-3xl shadow hover:shadow-2xl transition transform hover:-translate-y-2 p-6 text-right">
                    <h3 class="text-xl font-bold text-purple-700 mb-2">{{ $destination['name'] }}</h3>
                    <p class="text-gray-600 mb-1">{{ $destination['location'] }}</p>
                    <p class="text-lg font-semibold text-gray-800">{{ $destination['price'] }} ريال / ليلة</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="text-center mt-12">
    <button
        class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl transition transform hover:scale-105">
        عرض المزيد من الوجهات
    </button>
</div>

<!-- Footer -->
<footer class="animated-gradient text-white text-center p-6">
    © ٢٠٢٥ سفرنا. جميع الحقوق محفوظة.
</footer>

</body>
</html>
