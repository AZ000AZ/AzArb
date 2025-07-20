<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    // Listeleme sayfası (tüm deneyimler veya kategoriye göre)
    public function index(Request $request)
    {
        $experiences = Experience::paginate(12);
        $categories = $this->getCategories();

        return view('experiences.index', compact('experiences', 'categories'));
    }

    // “Yeni deneyim ekle” formu
    public function create()
    {
        $categories = $this->getCategories();

        return view('experiences.create', compact('categories'));
    }

    // Form gönderildiğinde kaydetme işlemi
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'city'        => 'required|string|max:255',
            'category'    => 'required|string|max:255',
            'rating'      => 'nullable|numeric|min:0|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('experiences', 'public');
        }

        Experience::create($data);

        return redirect()
            ->route('experiences.index')
            ->with('success', 'تمت إضافة التجربة بنجاح');
    }

    // Belirli kategoriye göre filtreleme
    public function category($category)
    {
        $experiences = Experience::where('category', $category)->paginate(12);
        $categories = $this->getCategories();

        return view('experiences.index', compact('experiences', 'categories', 'category'));
    }

    // Kategori datalarını merkezi olarak tanımla
    private function getCategories()
    {
        $all = ['الطعام والشراب','الطبيعة والهواء الطلق','الرياضة','الفنون والثقافة','الموسيقى','الشواطئ'];
        $counts = Experience::select('category')
            ->selectRaw('count(*) as cnt')
            ->groupBy('category')
            ->pluck('cnt','category')
            ->toArray();

        return collect($all)->map(fn($cat) => [
            'name'  => $cat,
            'icon'  => $this->iconFor($cat),
            'count' => $counts[$cat] ?? 0,
        ])->toArray();
    }

    // Kategoriye göre ikon eşleştirme
    private function iconFor($category)
    {
        return match ($category) {
            'الطعام والشراب'      => '🍽️',
            'الطبيعة والهواء الطلق'=> '🌲',
            'الرياضة'             => '🏔️',
            'الفنون والثقافة'     => '🎨',
            'الموسيقى'            => '🎵',
            'الشواطئ'             => '🌊',
            default                => '📌',
        };
    }
}
