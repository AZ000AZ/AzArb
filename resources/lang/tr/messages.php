<?php
return [
    'welcome' => 'Hoşgeldiniz',
    'search' => 'Ara',
    'categories' => 'Kategoriler',
];


<div x-show="languageModalOpen"
     @click.away="languageModalOpen = false"
     x-transition
     x-cloak
     class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-2xl shadow-xl w-96 text-gray-800">
        <h2 class="text-xl font-bold mb-4">اختر اللغة</h2>

        <div class="space-y-2">
            <button @click="handleLanguageSelect({ code: 'ar', language: 'العربية' })" class="w-full py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
العربية
            </button>
            <button @click="handleLanguageSelect({ code: 'en', language: 'English' })" class="w-full py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
English
            </button>
            <button @click="handleLanguageSelect({ code: 'tr', language: 'Türkçe' })" class="w-full py-2 bg-gray-100 hover:bg-gray-200 rounded-lg">
Türkçe
            </button>
        </div>

        <div class="mt-4 text-center">
            <button @click="languageModalOpen = false" class="text-red-500 hover:underline">
إغلاق
            </button>
        </div>
    </div>

</div>
