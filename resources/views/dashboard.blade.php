@extends('layouts.app')
@section('body_class', '')
@section('body_style', 'background: linear-gradient(135deg, #064e3b, #047857, #065f46);')
@section('content')
    <div class="max-w-2xl mx-auto bg-white text-gray-900 p-6 rounded shadow text-center">
        <h1 class="text-2xl font-bold mb-4">Dashboard'a Hoşgeldin, {{ Auth::user()->name }}!</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                Çıkış Yap (Test)
            </button>
        </form>
    </div>
@endsection
