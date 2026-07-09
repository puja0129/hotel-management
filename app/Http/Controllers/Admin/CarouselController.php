<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::orderBy('sort_order')->latest()->paginate(10);
        return view('admin.carousels.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousels.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:2048',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image_url' => 'nullable|string|max:2048',
            'image_upload' => 'nullable|image|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_upload')) {
            $imagePath = $request->file('image_upload')->store('carousels', 'public');
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        if (!$imagePath) {
            return back()->withInput()->withErrors(['image_upload' => 'Please upload an image or provide an image URL.']);
        }

        $carousel = new Carousel([
            'image' => $imagePath,
            'subtitle' => $validated['subtitle'] ?? null,
            'title' => $validated['title'],
            'button1_text' => $validated['button1_text'] ?? null,
            'button1_link' => $validated['button1_link'] ?? null,
            'button2_text' => $validated['button2_text'] ?? null,
            'button2_link' => $validated['button2_link'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? true),
        ]);
        $carousel->save();

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel slide created successfully.');
    }

    public function show(Carousel $carousel)
    {
        return view('admin.carousels.show', compact('carousel'));
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousels.form', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button1_text' => 'nullable|string|max:255',
            'button1_link' => 'nullable|string|max:2048',
            'button2_text' => 'nullable|string|max:255',
            'button2_link' => 'nullable|string|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image_url' => 'nullable|string|max:2048',
            'image_upload' => 'nullable|image|max:4096',
        ]);

        $carousel->fill([
            'subtitle' => $validated['subtitle'] ?? null,
            'title' => $validated['title'],
            'button1_text' => $validated['button1_text'] ?? null,
            'button1_link' => $validated['button1_link'] ?? null,
            'button2_text' => $validated['button2_text'] ?? null,
            'button2_link' => $validated['button2_link'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => (bool)($validated['is_active'] ?? false),
        ]);

        if ($request->hasFile('image_upload')) {
            $carousel->image = $request->file('image_upload')->store('carousels', 'public');
        } elseif (!empty($validated['image_url'])) {
            $carousel->image = $validated['image_url'];
        }

        $carousel->save();

        return redirect()->route('admin.carousels.index')->with('success', 'Carousel slide updated successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('admin.carousels.index')->with('success', 'Carousel slide deleted successfully.');
    }
}
