<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; // Eğer Property modelin varsa

class PropertyController extends Controller
{
    public function index()
    {
        // Eğer Property modelin varsa:
        // $properties = Property::latest()->paginate(12);
        // return view('properties.index', compact('properties'));

        // Şimdilik test için boş koleksiyon gönder:
        $properties = Property::latest()->paginate(12);
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        // Validate and store the property
    }

    public function show($id)
    {
        // Show a single property
    }

    public function edit($id)
    {
        return view('properties.edit');
    }

    public function update(Request $request, $id)
    {
        // Update the property
    }

    public function destroy($id)
    {
        // Delete the property
    }
}
