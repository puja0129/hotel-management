<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stars'       => 'required|integer|min:1|max:5',
            'bed_count'   => 'required|integer|min:1',
            'bath_count'  => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        $room = new Room($validated);
        // Correctly handle the boolean fields
        $room->is_available = $request->input('is_available', 0); // expects 1 or 0
        $room->wifi = $request->has('wifi'); // checkbox handling
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $room->image = $path;
        } else {
            $room->image = 'room-1.jpg'; // default fallback
        }

        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.form', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stars'       => 'required|integer|min:1|max:5',
            'bed_count'   => 'required|integer|min:1',
            'bath_count'  => 'required|integer|min:1',
            'description' => 'required|string',
        ]);

        $room->fill($validated);
        $room->is_available = $request->input('is_available', 0);
        $room->wifi = $request->has('wifi');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            $room->image = $path;
        }

        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
}
