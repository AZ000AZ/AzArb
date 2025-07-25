<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    // Listing page (all experiences or by category)
    public function index(Request $request)
    {
        $query = Experience::query();

        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $experiences = $query->latest()->paginate(12);
        $categories = $this->getCategories();
        $selectedCategory = $request->category ?? 'All';

        return view('experiences.index', compact('experiences', 'categories', 'selectedCategory'));
    }

    // “Add New Experience” form
    public function create()
    {
        $categories = $this->getCategories();
        return view('experiences.create', compact('categories'));
    }

    // Save when form is submitted
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
            ->with('success', 'Experience added successfully');
    }

    // Edit form
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        $categories = $this->getCategories();
        return view('experiences.edit', compact('experience', 'categories'));
    }

    // Update action
    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

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

        $experience->update($data);

        return redirect()
            ->route('experiences.index')
            ->with('success', 'Experience updated successfully!');
    }

    // Delete action
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()
            ->route('experiences.index')
            ->with('success', 'Experience deleted successfully!');
    }

    // Optional category filter
    public function category($category)
    {
        $experiences = Experience::where('category', $category)->paginate(12);
        $categories = $this->getCategories();

        return view('experiences.index', compact('experiences', 'categories', 'category'));
    }

    // Define categories centrally
    private function getCategories()
    {
        $all = ['Food & Drinks', 'Nature & Outdoors', 'Sports', 'Arts & Culture', 'Music', 'Beaches'];
        $counts = Experience::select('category')
            ->selectRaw('count(*) as cnt')
            ->groupBy('category')
            ->pluck('cnt', 'category')
            ->toArray();

        return collect($all)->map(fn($cat) => [
            'name'  => $cat,
            'icon'  => $this->iconFor($cat),
            'count' => $counts[$cat] ?? 0,
        ])->toArray();
    }

    // Icon matching by category
    private function iconFor($category)
    {
        return match ($category) {
            'Food & Drinks'      => '🍽️',
            'Nature & Outdoors'  => '🌲',
            'Sports'             => '🏔️',
            'Arts & Culture'     => '🎨',
            'Music'              => '🎵',
            'Beaches'            => '🌊',
            default              => '📌',
        };
    }
}
