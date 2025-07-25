<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Experience;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $featuredExperiences = Experience::latest()
            ->take(3)
            ->get(['id', 'title', 'description', 'image', 'rating'])
            ->map(fn($exp) => [
                'id' => $exp->id,
                'title' => $exp->title,
                'description' => $exp->description,
                'image' => $exp->image ? asset('storage/' . $exp->image) : 'https://via.placeholder.com/400x300',
                'rating' => $exp->rating,
                'reviews' => rand(50, 300),
                'price' => 'From $' . random_int(100, 600),
                'category' => $exp->category,
            ]);

        $topDestinations = Property::select('location')
            ->selectRaw('count(*) AS total')
            ->groupBy('location')
            ->orderByDesc('total')
            ->take(4)
            ->get()
            ->map(fn($row) => [
                'name' => $row->location,
                'properties' => $row->total . '+ properties',
                'gradient' => $this->randomGradient(),
            ]);

        $serverFeatures = [
            'interactiveHeader' => true,
            'languageSelector' => true,
            'favoritesSystem' => true,
            'userProfile' => auth()->check(),
            'mobileMenu' => true,
        ];

        return view('home', compact(
            'featuredExperiences',
            'topDestinations',
            'serverFeatures'
        ));
    }

    private function randomGradient(): string
    {
        $gradients = [
            'from-blue-500 to-purple-600',
            'from-green-500 to-teal-600',
            'from-orange-500 to-red-600',
            'from-pink-500 to-rose-600',
        ];
        return $gradients[array_rand($gradients)];
    }
}
