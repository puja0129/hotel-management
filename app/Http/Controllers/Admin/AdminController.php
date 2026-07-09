<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_rooms'      => Room::count(),
            'total_bookings'   => Booking::count(),
            'total_users'      => User::where('is_admin', false)->count(),
            'revenue'          => Booking::where('payment_status', 'paid')->sum('total_price'),
            'recent_bookings'  => Booking::with('user', 'room')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
