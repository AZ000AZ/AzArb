<div x-show="languageModalOpen" x-transition:enter="modal-enter" x-transition:enter-active="modal-enter-active"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm" style="display: none;">
    <div @click.away="languageModalOpen = false" class="bg-white rounded-2xl m-4 w-full max-w-4xl max-h-[90vh] overflow-hidden">
        <div x-data="languageModalData()">
            <!-- Header -->
            <div class="border-b border-gray-200 p-6 pb-0">
                <div class="flex items-center justify-between">
                    <div class="flex space-x-8 space-x-reverse">
                        <button @click="activeTab = 'language'"
                                :class="activeTab === 'language' ? 'border-black text-black' : 'border-transparent text-gray-500 hover:text-gray-700'"
                                class="pb-4 px-2 border-b-2 font-medium transition-colors">
                            اللغة والمنطقة
                        </button>
                        <button @click="activeTab = 'category'"
                                :class="activeTab === 'category' ? 'border-black text-black' : 'border-transparent text-gray-500 hover:text-gray-700'"
                                class="pb-4 px-2 border-b-2 font-medium transition-colors">
                            الفئة
                        </button>
                    </div>
                    <button @click="languageModalOpen = false" class="p-2 hover:bg-gray-100 rounded-full transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="overflow-y-auto max-h-[calc(90vh-120px)]">
                <!-- Language Tab -->
                <div x-show="activeTab === 'language'" class="p-6 space-y-8">
                    <!-- Translation Toggle -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                        <div class="flex items-center space-x-3 space-x-reverse">
                            <i class="fas fa-language text-gray-600"></i>
                            <div>
                                <h3 class="font-medium text-gray-900">الترجمة</h3>
                                <p class="text-sm text-gray-600">ترجمة الأوصاف والتقييمات تلقائياً إلى العربية</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" x-model="translationEnabled" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-black"></div>
                        </label>
                    </div>

                    <!-- Suggested Languages -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">لغات ومناطق مقترحة</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <template x-for="lang in suggestedLanguages" :key="lang.code">
                                <button @click="selectLanguage(lang)" class="p-4 text-right border border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition-all">
                                    <div class="font-medium text-gray-900" x-text="lang.language"></div>
                                    <div class="text-sm text-gray-600" x-text="lang.region"></div>
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- All Languages -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">اختيار اللغة والمنطقة</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                            <template x-for="lang in allLanguages" :key="lang.code">
                                <button @click="selectLanguage(lang)"
                                        :class="selectedLanguage === lang.code ? 'border-black bg-gray-50' : 'border-gray-200'"
                                        class="p-3 text-right border rounded-lg hover:border-gray-300 hover:bg-gray-50 transition-all">
                                    <div class="font-medium text-gray-900 text-sm" x-text="lang.language"></div>
                                    <div class="text-xs text-gray-600" x-text="lang.region"></div>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Category Tab -->
                <div x-show="activeTab === 'category'" class="p-6">
                    <div class="text-center py-12">
                        <i class="fas fa-globe text-6xl text-gray-400 mb-4"></i>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">فئات المحتوى</h3>
                        <p class="text-gray-600">سيتم إضافة فئات المحتوى قريباً</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function languageModalData() {
        return {
            activeTab: 'language',
            translationEnabled: true,
            selectedLanguage: 'ar-WW',
            suggestedLanguages: [
                { code: 'en-US', language: 'English', region: 'United States' },
                { code: 'tr-TR', language: 'Türkçe', region: 'Türkiye' }
            ],
            allLanguages: [
                { code: 'ar-WW', language: 'العربية', region: 'العالم' },
                { code: 'ca-ES', language: 'Català', region: 'Espanya' },
                { code: 'bs-BA', language: 'Bosanski', region: 'Bosna i Hercegovina' },
                { code: 'id-ID', language: 'Bahasa Indonesia', region: 'Indonesia' },
                { code: 'az-AZ', language: 'Azərbaycan dili', region: 'Azərbaycan' },
                { code: 'de-AT', language: 'Deutsch', region: 'Österreich' },
                { code: 'de-DE', language: 'Deutsch', region: 'Deutschland' },
                { code: 'da-DK', language: 'Dansk', region: 'Danmark' },
                { code: 'cnr-ME', language: 'Crnogorski', region: 'Crna Gora' },
                { code: 'cs-CZ', language: 'Čeština', region: 'Česká republika' },
                { code: 'en-CA', language: 'English', region: 'Canada' },
                { code: 'en-AU', language: 'English', region: 'Australia' },
                { code: 'et-EE', language: 'Eesti', region: 'Eesti' },
                { code: 'de-LU', language: 'Deutsch', region: 'Luxemburg' },
                { code: 'de-CH', language: 'Deutsch', region: 'Schweiz' },
                { code: 'en-SG', language: 'English', region: 'Singapore' },
                { code: 'en-NZ', language: 'English', region: 'New Zealand' },
                { code: 'en-IE', language: 'English', region: 'Ireland' },
                { code: 'en-IN', language: 'English', region: 'India' },
                { code: 'en-GY', language: 'English', region: 'Guyana' },
                { code: 'es-BO', language: 'Español', region: 'Bolivia' },
                { code: 'es-BZ', language: 'Español', region: 'Belice' },
                { code: 'es-AR', language: 'Español', region: 'Argentina' },
                { code: 'en-GB', language: 'English', region: 'United Kingdom' },
                { code: 'en-AE', language: 'English', region: 'United Arab Emirates' }
            ],

            selectLanguage(language) {
                this.selectedLanguage = language.code;
                // Call parent method
                this.$dispatch('language-selected', language);
                toastr.success(`تم تغيير اللغة إلى ${language.language}`);
            }
        }
    }
</script>
