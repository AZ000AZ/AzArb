<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::paginate(12);

        $categories = [
            ['name' => '🍽️ الطعام والشراب', 'icon' => '🍽️', 'count' => 234, 'color' => 'from-orange-500 to-red-600'],
            ['name' => '🌲 الطبيعة والهواء الطلق', 'icon' => '🌲', 'count' => 189, 'color' => 'from-green-500 to-emerald-600'],
            ['name' => '🏔️ الرياضة', 'icon' => '🏔️', 'count' => 156, 'color' => 'from-blue-500 to-indigo-600'],
            ['name' => '🎨 الفنون والثقافة', 'icon' => '🎨', 'count' => 207, 'color' => 'from-purple-500 to-pink-600'],
            ['name' => '🎵 الموسيقى', 'icon' => '🎵', 'count' => 98, 'color' => 'from-pink-500 to-rose-600'],
            ['name' => '🌊 الشواطئ', 'icon' => '🌊', 'count' => 143, 'color' => 'from-cyan-500 to-blue-600'],
        ];

        return view('experiences', compact('experiences', 'categories'));
    }

    public function create()
    {
        return view('experiences.create');
    }
}
