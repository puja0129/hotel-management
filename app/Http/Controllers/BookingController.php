<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'check_in'  => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults'    => 'required|integer|min:1|max:10',
            'children'  => 'nullable|integer|min:0|max:10',
            'room_id'   => 'required|exists:rooms,id',
        ], [
            'check_out.after' => 'The Check-out date must be after the Check-in date.',
            'adults.min' => 'At least one adult is required for a booking.',
        ]);

        $room = Room::findOrFail($request->room_id);

        // QA FIX: Check Room Capacity (Assume 2 people per bed if 'capacity' column missing)
        $capacity = $room->capacity ?? ($room->bed_count * 2);
        $totalGuests = $request->adults + ($request->children ?? 0);
        if ($totalGuests > $capacity) {
            return back()->withErrors(['adults' => "This room has a maximum capacity of {$capacity} guests."])->withInput();
        }

        // QA FIX: Check for Overlapping Bookings
        $overlap = Booking::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($request) {
                $query->where('check_in', '<', $request->check_out)
                      ->where('check_out', '>', $request->check_in);
            })->exists();

        if ($overlap) {
            return back()->withErrors(['check_in' => 'The room is already booked for the selected dates.'])->withInput();
        }

        $nights = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
        $total  = $room->price * $nights;

        $booking = Booking::create([
            'user_id'        => Auth::id(),
            'room_id'        => $request->room_id,
            'check_in'       => $request->check_in,
            'check_out'      => $request->check_out,
            'adults'         => $request->adults,
            'children'       => $request->children ?? 0,
            'status'         => 'pending',
            'total_price'    => $total,
            'payment_status' => 'unpaid',
        ]);

        return redirect()->route('dashboard')
            ->with('success', "Room booked for {$nights} night(s)! Total: ₹{$total}. Please complete payment.");
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        $booking->update(['status' => 'cancelled']);
        return back()->with('success', 'Booking cancelled successfully.');
    }
}
