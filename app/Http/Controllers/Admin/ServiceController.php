<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = \App\Models\HotelService::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'short_description' => 'required|string',
        ]);

        $service = new \App\Models\HotelService($validated);
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function show(string $id)
    {
        // View not typically needed for simple service
    }

    public function edit(string $id)
    {
        $service = \App\Models\HotelService::findOrFail($id);
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:50',
            'short_description' => 'required|string',
        ]);

        $service = \App\Models\HotelService::findOrFail($id);
        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(string $id)
    {
        $service = \App\Models\HotelService::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
