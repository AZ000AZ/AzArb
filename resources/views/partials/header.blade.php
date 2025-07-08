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
                <a href="{{ route('experiences') }}" class="text-gray-700 hover:text-purple-600 font-medium transition-colors {{ (isset($active) && $active == 'experiences') ? 'border-b-2 border-purple-600' : '' }}">التجارب</a>
                <a href="#" class="text-gray-700 hover:text-purple-600 font-medium">أصبح مضيفاً</a>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4 space-x-reverse">
                <button class="hidden md:flex items-center space-x-2 space-x-reverse px-3 py-2 rounded-md hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 3C7.032 3 3 7.032 3 12s4.032 9 9 9 9-4.032 9-9-4.032-9-9-9zm0 2a7 7 0 016.92 6H5.08A7 7 0 0112 5zm0 14a7 7 0 01-6.92-6h13.84A7 7 0 0112 19z" />
                    </svg>
                    <span class="text-gray-700 text-sm font-medium">العربية</span>
                </button>
                <button class="p-2 rounded-full hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                    </svg>
                </button>
                <button class="p-2 rounded-full hover:bg-purple-50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M15 17h5l-1.405-1.405C18.79 14.79 18 13.42 18 12V8c0-3.314-2.686-6-6-6S6 4.686 6 8v4c0 1.42-.79 2.79-1.595 3.595L3 17h5m4 0v1a3 3 0 01-6 0v-1h6z" />
                    </svg>
                </button>
                <div class="flex items-center bg-white border-2 border-gray-200 rounded-full py-2 px-3 hover:shadow-xl transition cursor-pointer hover:border-purple-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <div class="bg-gradient-to-r from-purple-500 to-blue-500 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
