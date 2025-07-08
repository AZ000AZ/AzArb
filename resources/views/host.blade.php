<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>أصبح مضيفاً - رحلاتي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-800 relative overflow-hidden">

<!-- Floating Background Shapes -->
<div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-[20%] left-[10%] w-40 h-40 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full opacity-10 animate-pulse"></div>
    <div class="absolute bottom-[30%] right-[8%] w-32 h-32 bg-gradient-to-r from-teal-400 to-cyan-500 rounded-[50%_20%_80%_30%/30%_60%_70%_40%] opacity-10 animate-bounce"></div>
    <div class="absolute top-[60%] left-[5%] w-24 h-24 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full opacity-10 animate-ping"></div>
</div>
<!-- Header -->
<header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20 w-full">

            <!-- Logo (En Sol) -->
            <div class="bg-gradient-to-r from-emerald-400 to-teal-500 text-white px-6 py-3 rounded-3xl text-2xl font-bold shadow-2xl transform hover:scale-105 transition-all duration-300 cursor-pointer">
                <i data-feather="compass" class="inline w-6 h-6 ml-2"></i> رحلاتي
            </div>

            <!-- Navigation (Ortada) -->
            <nav class="hidden md:flex items-center space-x-8 space-x-reverse">
                <a href="{{ route('properties.index') }}" class="relative text-white/80 font-semibold px-4 py-2 rounded-full hover:bg-white/20 hover:text-white">الإقامات</a>
                <a href="{{ route('experiences') }}" class="relative text-white/80 font-semibold px-4 py-2 rounded-full hover:bg-white/20 hover:text-white">التجارب</a>
                <a href="{{ route('host') }}" class="relative text-white font-semibold px-4 py-2 rounded-full hover:bg-white/20 bg-gradient-to-r from-emerald-400 to-teal-500">أصبح مضيفاً</a>
            </nav>

            <!-- Icon Group (En Sağ) -->
            <div class="flex items-center space-x-3 space-x-reverse">
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
    </div>
</header>

        </div>
    </div>
</header>


<!-- Hero Section -->
<section class="relative py-24 text-center text-white">
    <div class="max-w-3xl mx-auto px-4">
        <div class="animate-bounce mb-8">
            <i data-feather="rocket" class="w-16 h-16 text-emerald-400 mx-auto"></i>
        </div>
        <h1 class="text-4xl md:text-5xl font-bold mb-4">ابدأ رحلتك كمضيف</h1>
        <p class="text-lg md:text-xl mb-8">شارك مساحتك مع المسافرين من جميع أنحاء العالم واحصل على دخل إضافي</p>
        <a href="#" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold px-8 py-4 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center">
            <i data-feather="target" class="w-5 h-5 ml-2"></i> ابدأ الآن
        </a>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white/5 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        @php
            $stats = [
                ['10,000+', 'مضيف نشط', 'users'],
                ['50,000+', 'حجز شهرياً', 'trending-up'],
                ['4.8', 'تقييم المضيفين', 'star'],
                ['95%', 'معدل الرضا', 'award'],
            ];
        @endphp
        @foreach ($stats as [$number, $label, $icon])
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-6 hover:bg-white/20 transition transform hover:scale-105">
                <i data-feather="{{ $icon }}" class="w-8 h-8 text-emerald-400 mx-auto mb-3"></i>
                <div class="text-3xl font-bold text-white mb-2">{{ $number }}</div>
                <div class="text-white/70 text-sm">{{ $label }}</div>
            </div>
        @endforeach
    </div>
</section>

<!-- Benefits Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">لماذا تصبح مضيفاً؟</h2>
        <p class="text-lg text-white/80 mb-12">انضم إلى آلاف المضيفين الذين يحققون دخلاً إضافياً ويشاركون ثقافتهم مع العالم</p>
        @php
            $benefits = [
                ['💰','دخل إضافي','احصل على دخل شهري ثابت من خلال تأجير مساحتك','from-green-500 to-emerald-600'],
                ['🌍','تواصل عالمي','التقي بأشخاص من جميع أنحاء العالم وكون صداقات جديدة','from-blue-500 to-cyan-600'],
                ['🛡️','حماية شاملة','تأمين شامل لحماية ممتلكاتك ودعم على مدار الساعة','from-purple-500 to-indigo-600'],
                ['⭐','مرونة','تحكم في الأسعار وتواريخ الإتاحة حسب جدولك','from-yellow-500 to-orange-600'],
            ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($benefits as [$emoji, $title, $desc, $color])
                <div class="bg-gradient-to-br {{ $color }} text-white rounded-2xl p-6 shadow-2xl hover:scale-105 transition transform">
                    <div class="text-5xl mb-4">{{ $emoji }}</div>
                    <h3 class="text-lg font-bold mb-2">{{ $title }}</h3>
                    <p class="text-sm opacity-90">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-emerald-600/20 via-teal-600/20 to-cyan-700/20 text-center text-white">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">مستعد لتبدأ رحلتك؟</h2>
        <p class="text-lg mb-6">انضم إلى مجتمع المضيفين وابدأ في تحقيق دخل إضافي من مساحتك</p>
        <a href="#" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold px-8 py-4 rounded-full shadow-2xl hover:scale-105 transition-all duration-300 inline-flex items-center justify-center">
            <i data-feather="rocket" class="w-5 h-5 ml-2"></i> ابدأ الاستضافة الآن
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white/10 backdrop-blur-lg border-t border-white/20 py-8 text-center text-white">
    <p>© ٢٠٢٥ رحلاتي. جميع الحقوق محفوظة.</p>
</footer>

<script>feather.replace();</script>

</body>
</html>
