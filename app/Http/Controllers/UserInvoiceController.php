<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserInvoiceController extends Controller
{
    public function preview(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this invoice.');
        }

        $booking->load(['user', 'room']);
        return view('user.invoice_preview', compact('booking'));
    }

    public function downloadPdf(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this invoice.');
        }

        $booking->load(['user', 'room']);
        $services = [];
        return view('pdf.invoice', compact('booking', 'services'));
    }
}
