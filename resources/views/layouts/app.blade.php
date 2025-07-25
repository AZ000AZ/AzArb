
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Trips</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <style>[x-cloak] { display: none; }</style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* ✅ Test amaçlı görünürlüğü artırır */
        form input, form label, form h1, form h2, form button {
            color: white !important;
            background-color: rgba(0, 100, 80, 0.3) !important;
        }

        input[type="file"] {
            background-color: rgba(255, 255, 255, 0.2) !important;
        }

        [x-cloak] { display: none; }
    </style>

    @stack('styles')
</head>

<body class="@yield('body_class')" style="@yield('body_style')">
@include('components.interactive-header')
@include('components.server-status')
@include('components.language-modal')
<main class="py-8">

    {{-- ✅ Başarı Mesajı Kutusu --}}
    @if (session('status'))
        <div class="max-w-4xl mx-auto mb-4 px-4 py-3 rounded-lg bg-green-500 text-white shadow">
            {{ session('status') }}
        </div>
    @endif

    @yield('content')

</main>

@stack('scripts')
</body>
</html>
