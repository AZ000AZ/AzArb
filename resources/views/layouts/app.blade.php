<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رحلاتي</title>

    <!-- Tailwind + App CSS (Vite üzerinden) -->
    @vite('resources/css/app.css')

    <!-- TailwindCDN (lokalde sorun yaşarsan) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AlpineJS (Dropdownlar ve Modallar için) -->
    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @include('partials.header-scripts')

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        .floating-circle {
            position: absolute;
            top: 120px;
            right: 100px;
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #f59e0b, #ea580c);
            border-radius: 50%;
            opacity: 0.8;
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gray-100 min-h-screen relative">

@include('components.interactive-header')
@include('components.server-status')


<main class="py-8">
    @yield('content')
</main>

@include('partials.footer')

@stack('scripts')

</body>
</html>
