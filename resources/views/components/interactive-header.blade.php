<div x-data="headerData()" class="relative">
    <!-- Header -->
    <header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-3xl text-2xl font-bold shadow-xl hover:scale-105 transition cursor-pointer flex items-center space-x-2 space-x-reverse">
                <i class="fas fa-compass"></i>
                <span>رحلاتي</span>
            </div>

            <!-- Navigation - Desktop -->
            <nav class="hidden md:flex items-center gap-4 mx-auto">
                <a href="{{ route('home') }}" class="text-white/80 font-semibold px-4 py-2 rounded-full hover:bg-white/20 hover:text-white transition">
                    الرئيسية
                </a>
                <a href="{{ route('properties.index') ?? '#' }}" class="text-white/80 font-semibold px-4 py-2 rounded-full hover:bg-white/20 hover:text-white transition">
                    الإقامات
                </a>
                <a href="{{ route('experiences.index') ?? '#' }}" class="bg-gradient-to-r from-red-400 to-pink-500 text-white shadow-lg font-semibold px-4 py-2 rounded-full transition">
                    التجارب
                </a>
                <a href="{{ route('host') ?? '#' }}" class="text-white/80 font-semibold px-4 py-2 rounded-full hover:bg-white/20 hover:text-white transition">
                    أصبح مضيفاً
                </a>
            </nav>

            <!-- Icons -->
            <div class="flex items-center gap-2">
                <!-- User Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                        <i class="fas fa-user"></i>
                    </button>

                    <div x-show="open" @click.away="open = false"
                         x-transition:enter="dropdown-enter"
                         x-transition:enter-active="dropdown-enter-active"
                         class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-lg rounded-xl shadow-xl border border-gray-200/50 py-2 z-50">
                        <a href="#" @click="handleProfileAction('الملف الشخصي')" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user w-4"></i>
                            الملف الشخصي
                        </a>
                        <a href="#" @click="handleProfileAction('الحجوزات')" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-bookmark w-4"></i>
                            حجوزاتي
                        </a>
                        <a href="#" @click="handleProfileAction('الإشعارات')" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-bell w-4"></i>
                            الإشعارات
                        </a>
                        <a href="#" @click="handleProfileAction('الإعدادات')" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-cog w-4"></i>
                            الإعدادات
                        </a>
                        <hr class="my-2">
                        <a href="#" @click="handleProfileAction('تسجيل الخروج')" class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 transition">
                            <i class="fas fa-sign-out-alt w-4"></i>
                            تسجيل الخروج
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = true" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition md:hidden">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Desktop Menu Button -->
                <div class="relative hidden md:block" x-data="{ open: false }">
                    <button @click="open = !open" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div x-show="open" @click.away="open = false"
                         x-transition:enter="dropdown-enter"
                         x-transition:enter-active="dropdown-enter-active"
                         class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-lg rounded-xl shadow-xl border border-gray-200/50 py-2 z-50">
                        <a href="#" @click="handleProfileAction('المساعدة')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            المساعدة والدعم
                        </a>
                        <a href="#" @click="handleProfileAction('الشروط')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            الشروط والأحكام
                        </a>
                        <a href="#" @click="handleProfileAction('الخصوصية')" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            سياسة الخصوصية
                        </a>
                    </div>
                </div>

                <!-- Favorites Button -->
                <button @click="favoritesModalOpen = true" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition relative">
                    <i class="fas fa-heart"></i>
                    <span x-show="favorites.length > 0" x-text="favorites.length" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold"></span>
                </button>

                <!-- Language Button -->
                <button @click="languageModalOpen = true" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <i class="fas fa-globe"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Modal -->
    <div x-show="mobileMenuOpen" x-transition:enter="modal-enter" x-transition:enter-active="modal-enter-active"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" style="display: none;">
        <div @click.away="mobileMenuOpen = false" class="bg-white rounded-2xl p-6 m-4 w-full max-w-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">القائمة الرئيسية</h3>
                <button @click="mobileMenuOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    الرئيسية
                </a>
                <a href="{{ route('properties.index') ?? '#' }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    الإقامات
                </a>
                <a href="{{ route('experiences.index') ?? '#' }}" class="block px-4 py-3 text-lg font-medium bg-gradient-to-r from-red-400 to-pink-500 text-white rounded-lg">
                    التجارب
                </a>
                <a href="{{ route('host') ?? '#' }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    أصبح مضيفاً
                </a>
            </div>
        </div>
    </div>

    <!-- Favorites Modal -->
    <div x-show="favoritesModalOpen" x-transition:enter="modal-enter" x-transition:enter-active="modal-enter-active"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" style="display: none;">
        <div @click.away="favoritesModalOpen = false" class="bg-white rounded-2xl p-6 m-4 w-full max-w-2xl max-h-[80vh] overflow-hidden">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-heart text-red-500"></i>
                    المفضلة (<span x-text="favorites.length"></span>)
                </h3>
                <button @click="favoritesModalOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="overflow-y-auto max-h-[60vh]">
                <div x-show="favorites.length === 0" class="text-center py-12">
                    <i class="fas fa-heart text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">لا توجد عناصر في المفضلة</h3>
                    <p class="text-gray-600">ابدأ بإضافة الأماكن والتجارب المفضلة لديك</p>
                </div>

                <div x-show="favorites.length > 0" class="space-y-4">
                    <template x-for="item in favorites" :key="item.id">
                        <div class="flex items-center gap-4 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                            <img :src="item.image" :alt="item.title" class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900" x-text="item.title"></h3>
                                <div class="flex items-center gap-1 text-sm text-gray-600 mt-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span x-text="item.location"></span>
                                </div>
                                <div class="flex items-center justify-between mt-2">
                                    <div class="flex items-center gap-1">
                                        <i class="fas fa-star text-yellow-400"></i>
                                        <span class="text-sm font-medium" x-text="item.rating"></span>
                                    </div>
                                    <div class="font-semibold text-purple-600" x-text="item.price"></div>
                                </div>
                            </div>
                            <button @click="removeFavorite(item.id)" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <!-- Language Modal -->
    @include('components.language-modal')
</div>

<script>
    function headerData() {
        return {
            mobileMenuOpen: false,
            favoritesModalOpen: false,
            languageModalOpen: false,
            currentLanguage: {
                code: 'ar-WW',
                language: 'العربية',
                region: 'العالم'
            },
            favorites: [
                {
                    id: '1',
                    title: 'فيلا فاخرة في دبي',
                    location: 'دبي، الإمارات',
                    image: 'https://via.placeholder.com/150x100',
                    price: '٨٥٠ ريال/ليلة',
                    rating: 4.9
                },
                {
                    id: '2',
                    title: 'شاليه جبلي في أبها',
                    location: 'أبها، السعودية',
                    image: 'https://via.placeholder.com/150x100',
                    price: '٣٢٠ ريال/ليلة',
                    rating: 4.8
                },
                {
                    id: '3',
                    title: 'رحلة صحراوية',
                    location: 'الرياض، السعودية',
                    image: 'https://via.placeholder.com/150x100',
                    price: '٤٥٠ ريال/شخص',
                    rating: 4.7
                }
            ],

            handleProfileAction(action) {
                toastr.info(`تم النقر على: ${action}`);
            },

            removeFavorite(id) {
                this.favorites = this.favorites.filter(item => item.id !== id);
                toastr.success('تم حذف العنصر من المفضلة');
            },

            handleLanguageSelect(language) {
                this.currentLanguage = language;
                this.languageModalOpen = false;
                toastr.success(`تم تغيير اللغة إلى ${language.language}`);
            }
        }
    }
</script>
