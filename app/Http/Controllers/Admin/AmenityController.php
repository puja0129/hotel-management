<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::latest()->paginate(20);
        return view('admin.amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('admin.amenities.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'required|in:food,gym,sports,games,spa,other',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:50',
            'price'        => 'required|numeric|min:0',
            'timings'      => 'nullable|string|max:100',
            'capacity'     => 'nullable|integer|min:1',
        ]);

        $amenity = new Amenity($validated);
        $amenity->is_available = $request->has('is_available');
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity added successfully.');
    }

    public function edit(Amenity $amenity)
    {
        return view('admin.amenities.form', compact('amenity'));
    }

    public function update(Request $request, Amenity $amenity)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'category'     => 'required|in:food,gym,sports,games,spa,other',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:50',
            'price'        => 'required|numeric|min:0',
            'timings'      => 'nullable|string|max:100',
            'capacity'     => 'nullable|integer|min:1',
        ]);

        $amenity->fill($validated);
        $amenity->is_available = $request->has('is_available');
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity updated successfully.');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('admin.amenities.index')->with('success', 'Amenity deleted successfully.');
    }
}
