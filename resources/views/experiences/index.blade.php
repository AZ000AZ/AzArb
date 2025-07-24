@extends('layouts.app')

@section('content')
    <div x-data x-init="console.log('✅ Alpine Çalışıyor!')" x-cloak></div>
    @section('body_class', '')
    @section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')

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

    <!-- Yeni Deneyim Ekle Button -->
    <div class="max-w-7xl mx-auto px-4 py-6 text-center">
        <a href="{{ route('experiences.create') }}" class="inline-block bg-gradient-to-r from-green-400 to-teal-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:scale-105 transition">
            + Yeni Deneyim Ekle
        </a>
    </div>

    <!-- Categories Section -->
    <!-- Categories Section -->
    <section class="py-12">
        <h2 class="text-center text-3xl font-bold mb-8">تصفح حسب الفئة</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 max-w-5xl mx-auto">
            @foreach($categories as $cat)
                <a href="{{ route('experiences.index', ['category' => $cat['name']]) }}" class="glass p-4 rounded-2xl flex flex-col items-center hover:scale-105 transition text-center">
                    <div class="text-2xl mb-2">{{ $cat['icon'] }}</div>
                    <span class="font-semibold">{{ $cat['name'] }}</span>
                    <span class="text-sm text-white/70">{{ $cat['count'] }} تجربة</span>
                </a>
            @endforeach
        </div>
    </section>


    <!-- Experiences Section -->
    <section class="py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-8 max-w-screen-2xl mx-auto px-6">
            @foreach($experiences as $experience)
                <div class="glass rounded-3xl overflow-hidden shadow-2xl hover:scale-105 transition transform duration-300">
                    <img src="{{ asset('storage/'.$experience->image) }}" alt="{{ $experience->title }}" class="w-full h-72 object-cover">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold mb-2">{{ $experience->title }}</h3>
                        <p class="text-base text-white/80 mb-2">📍 {{ $experience->city }}</p>
                        <p class="text-base text-white/80 mb-2">{{ $experience->description }}</p>
                        <div class="flex justify-between items-center mb-2">
                        <span class="bg-gradient-to-r from-orange-500 to-pink-600 px-4 py-2 rounded-full text-base font-semibold">
                            {{ $experience->price }} ريال
                        </span>
                            <span class="text-yellow-400 text-lg">⭐ {{ $experience->rating }}</span>
                        </div>
                        <div class="text-sm text-white/70">التصنيف: {{ $experience->category }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Featured Experiences Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">التجارب المميزة</h2>
                <p class="text-xl text-white/80">اكتشف أفضل التجارب المختارة بعناية</p>
            </div>

            @php
                $featuredExperiences = [
                    ['title' => 'رحلة استكشافية في الصحراء','description' => 'تجربة فريدة في قلب الصحراء العربية','image' => '/placeholder.svg?height=300&width=400','rating' => 4.9,'reviews' => 234,'price' => 'من ٤٥٠ ريال','category' => 'مغامرات'],
                    ['title' => 'جولة تاريخية في المدينة القديمة','description' => 'اكتشف تاريخ وثقافة المنطقة','image' => '/placeholder.svg?height=300&width=400','rating' => 4.8,'reviews' => 189,'price' => 'من ١٢٠ ريال','category' => 'ثقافة'],
                    ['title' => 'رحلة بحرية مع الغوص','description' => 'استمتع بجمال البحر الأحمر','image' => '/placeholder.svg?height=300&width=400','rating' => 4.7,'reviews' => 156,'price' => 'من ٣٢٠ ريال','category' => 'بحرية'],
                    ['title' => 'تجربة الطبخ التقليدي','description' => 'تعلم أسرار المطبخ العربي الأصيل','image' => '/placeholder.svg?height=300&width=400','rating' => 4.9,'reviews' => 298,'price' => 'من ٨٥ ريال','category' => 'طعام'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredExperiences as $experience)
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl overflow-hidden hover:bg-white/20 transition duration-500 transform hover:scale-105">
                        <div class="relative h-48">
                            <img src="{{ $experience['image'] }}" alt="{{ $experience['title'] }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute top-4 right-4">
                                <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">{{ $experience['category'] }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-white mb-2">{{ $experience['title'] }}</h3>
                            <p class="text-white/70 text-sm mb-4">{{ $experience['description'] }}</p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-1 space-x-reverse">
                                    <i class="fas fa-star text-yellow-400"></i>
                                    <span class="text-white font-semibold">{{ $experience['rating'] }}</span>
                                    <span class="text-white/60 text-sm">({{ $experience['reviews'] }})</span>
                                </div>
                                <div class="text-white font-bold">{{ $experience['price'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative bg-gradient-to-br from-orange-600 via-rose-600 to-fuchsia-700 overflow-hidden mt-4 pb-12" dir="rtl">
        <div class="absolute top-32 left-24 w-40 h-40 bg-gradient-to-br from-yellow-400 to-pink-500 rounded-full opacity-60"></div>

        <div class="relative z-10 flex flex-col items-center justify-center px-4">
            <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-10 max-w-5xl mx-auto text-center shadow-2xl">
                <div class="animate-pulse mb-6">
                    <i class="fas fa-bolt text-yellow-300 text-5xl"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">اكتشف تجارب جديدة</h2>
                <p class="text-xl md:text-2xl text-white/80 mb-8 max-w-3xl mx-auto leading-relaxed">
                    انضم إلى آلاف المسافرين الذين عاشوا تجارب لا تُنسى مع أفضل المضيفين حول العالم
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('host') }}" class="bg-gradient-to-r from-rose-500 to-fuchsia-600 hover:from-rose-600 hover:to-fuchsia-700 text-white font-semibold px-8 py-4 rounded-full transition transform hover:scale-105 shadow-lg flex items-center justify-center text-lg">
                        <i class="fas fa-users ml-3 text-xl"></i>
                        أصبح مضيفاً
                    </a>
                    <a href="#" class="bg-gradient-to-r from-orange-500 to-pink-600 hover:from-orange-600 hover:to-pink-700 text-white font-semibold px-8 py-4 rounded-full transition transform hover:scale-105 shadow-lg flex items-center justify-center text-lg">
                        <i class="fas fa-search ml-3 text-xl"></i>
                        ابحث عن تجارب
                    </a>
                </div>
            </div>

            <div class="mt-10 text-center">
                <div class="bg-gradient-to-r from-pink-500 to-purple-600 text-white px-5 py-3 rounded-2xl text-xl font-bold inline-block mb-4 shadow-lg">
                    <i class="fas fa-compass ml-2"></i>
                    رحلاتي
                </div>
                <p class="text-white/60 text-base mb-4">© ٢٠٢٥ رحلاتي، جميع الحقوق محفوظة</p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                        <i class="fab fa-whatsapp text-green-400 text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                        <i class="fab fa-youtube text-rose-500 text-lg"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition transform hover:scale-110">
                        <i class="fab fa-twitter text-sky-400 text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
