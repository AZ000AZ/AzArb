<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HostController extends Controller
{
    public function create()
    {
        // Misafir işleme sayfasını göster
        return view('host.index');
    }

    public function store(Request $request)
    {
        // Gelen verileri doğrula
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'price'       => 'required|integer',
            'bedrooms'    => 'required|integer',
            'bathrooms'   => 'required|integer',
            'max_guests'  => 'required|integer',
            'category'    => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        // Fotoğraf varsa kaydet
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('properties', 'public');
        }

        // Yeni ilanı veritabanına ekle
        Property::create($data);

        // Başarıyla eklenince yönlendir
        return redirect()
            ->route('properties.index')
            ->with('success', 'تمت إضافة الإقامة بنجاح');
    }
}
