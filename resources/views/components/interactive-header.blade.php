<div x-data="headerData()" class="relative">
    <!-- Header -->
    <header class="bg-white/10 backdrop-blur-lg border-b border-white/20 sticky top-0 z-50 shadow-2xl">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-3xl text-2xl font-bold shadow-xl hover:scale-105 transition cursor-pointer flex items-center space-x-2 space-x-reverse">
                <i class="fas fa-compass"></i>
                <span>My Trips</span>
            </div>

            <!-- Navigation - Desktop -->
            <nav class="hidden md:flex items-center gap-4 mx-auto">
                <a href="{{ route('home') }}"
                   class="px-4 py-2 rounded-full font-semibold transition
       {{ request()->routeIs('home') ? 'bg-gradient-to-r from-pink-400 to-pink-600 text-white shadow-lg' : 'text-white/80 hover:text-white hover:bg-white/20' }}">
                    Home
                </a>

                <a href="{{ route('properties.index') }}"
                   class="px-4 py-2 rounded-full font-semibold transition
       {{ request()->routeIs('properties.index') ? 'bg-gradient-to-r from-purple-400 to-purple-600 text-white shadow-lg' : 'text-white/80 hover:text-white hover:bg-white/20' }}">
                    Properties
                </a>

                <a href="{{ route('experiences.index') }}"
                   class="px-4 py-2 rounded-full font-semibold transition
       {{ request()->routeIs('experiences.index') ? 'bg-gradient-to-r from-red-400 to-pink-500 text-white shadow-lg' : 'text-white/80 hover:text-white hover:bg-white/20' }}">
                    Experiences
                </a>

                <a href="{{ route('host') }}"
                   class="px-4 py-2 rounded-full font-semibold transition
       {{ request()->routeIs('host') ? 'bg-gradient-to-r from-red-400 to-pink-500  text-white shadow-lg' : 'text-white/80 hover:text-white hover:bg-white/20' }}">
                    Services
                </a>
            </nav>
            <!-- Icons -->
            <div class="flex items-center gap-2">
                <!-- User Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                        <i class="fas fa-user"></i>
                    </button>

                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-lg rounded-xl shadow-xl border border-gray-200/50 py-2 z-50"
                    >
                        <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-user w-4"></i>
                            Profile
                        </a>
                        <a href="{{ route('bookings') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-bookmark w-4"></i>
                            My Bookings
                        </a>
                        <a href="{{ route('notifications') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-bell w-4"></i>
                            Notifications
                        </a>
                        <a href="{{ route('settings') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            <i class="fas fa-cog w-4"></i>
                            Settings
                        </a>
                        <hr class="my-2">
                        <form method="POST" action="{{ route('logout') }}" class="px-4">
                            @csrf
                            <button type="submit" class="w-full bg-red-500 text-white text-center py-2 rounded hover:bg-red-600 transition">
                                Logout (Test)
                            </button>
                        </form>
                    </div>
                </div>


                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = true" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition md:hidden">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Desktop Menu Button -->
                <div class="relative hidden md:block" x-data="{ open: false }" x-cloak>
                    <button @click="open = !open" class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div x-show="open" @click.outside="open = false"
                         class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-lg rounded-xl shadow-xl border border-gray-200/50 py-2 z-50">
                        <a href="{{ route('help') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            Help & Support
                        </a>
                        <a href="{{ route('terms') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            Terms & Conditions
                        </a>
                        <a href="{{ route('privacy') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                            Privacy Policy
                        </a>
                    </div>
                </div>


                <!-- ❤️ Favorites Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                            class="w-10 h-10 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white hover:bg-white/20 transition">
                        <i class="fas fa-heart text-white text-xl"></i>
                    </button>

                    <div x-show="open" @click.outside="open = false"
                         class="absolute right-0 mt-2 bg-white text-gray-800 w-60 shadow-lg rounded-lg p-4 z-50 text-center">

                        @auth
                            @if(auth()->user()->favorites && auth()->user()->favorites->count())
                                <ul class="text-left space-y-2">
                                    @foreach(auth()->user()->favorites as $fav)
                                        <li class="border-b pb-1">{{ $fav->title ?? 'Untitled' }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-red-500 text-lg"><i class="fas fa-heart"></i></div>
                                <p class="text-sm text-gray-600 mt-1">No favorite items</p>
                            @endif

                            <!-- ✅ Link to full favorites page -->
                            <div class="mt-4">
                                <a href="{{ route('favorites.index') }}"
                                   class="inline-block text-sm text-blue-600 hover:text-blue-800 underline">
                                    View All Favorites
                                </a>
                            </div>

                        @else
                            <div class="text-red-500 text-lg"><i class="fas fa-heart"></i></div>
                            <p class="text-sm text-gray-600 mt-1">
                                Please <a href="{{ route('login') }}" class="text-blue-500 underline">login</a> to view favorites.
                            </p>
                        @endauth

                    </div>
                </div>

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
                <h3 class="text-xl font-bold text-gray-900">Main Menu</h3>
                <button @click="mobileMenuOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="space-y-4">
                <a href="{{ route('home') }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    Home
                </a>
                <a href="{{ route('properties.index') }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    Properties
                </a>
                <a href="{{ route('experiences.index') }}" class="block px-4 py-3 text-lg font-medium bg-gradient-to-r from-red-400 to-pink-500 text-white rounded-lg">
                    Experiences
                </a>
                <a href="{{ route('host') }}" class="block px-4 py-3 text-lg font-medium hover:bg-gray-100 rounded-lg transition">
                    Services
                </a>

                <!-- ✅ Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-3 text-lg font-medium text-red-600 hover:bg-red-50 rounded-lg transition text-left">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>

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
                    Favorites (<span x-text="favorites.length"></span>)
                </h3>
                <button @click="favoritesModalOpen = false" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="overflow-y-auto max-h-[60vh]">
                <div x-show="favorites.length === 0" class="text-center py-12">
                    <i class="fas fa-heart text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No items in favorites</h3>
                    <p class="text-gray-600">Start adding your favorite places and experiences</p>
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
                code: 'en-US',
                language: 'English',
                region: 'World'
            },

            favorites: [
                // Example favorites...
            ],

            handleProfileAction(action) {
                toastr.info(`Clicked on: ${action}`);
            },

            removeFavorite(id) {
                this.favorites = this.favorites.filter(item => item.id !== id);
                toastr.success('Item removed from favorites');
            },

            handleLanguageSelect(language) {
                this.currentLanguage = language;
                this.languageModalOpen = false;
                toastr.success(`Language changed to ${language.language}`);
            }
        }
    }
</script>
