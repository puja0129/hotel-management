<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\HotelService;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Mail\BookingConfirmationMail;

class PaymentController extends Controller
{
    /**
     * Show the dummy payment/checkout page for the booking.
     */
    public function checkout(Booking $booking)
    {
        // Ensure the logged-in user owns this booking
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Already paid — no need to re-pay
        if ($booking->payment_status === 'paid') {
            return redirect()->route('dashboard')->with('success', 'This booking is already paid.');
        }

        // Already cancelled
        if ($booking->status === 'cancelled') {
            return redirect()->route('dashboard')->with('error', 'This booking has been cancelled and cannot be paid.');
        }

        // Generate a dummy session token and save it on the booking
        $dummySessionId = 'DUMMY-' . strtoupper(Str::random(16));
        $booking->update(['stripe_session_id' => $dummySessionId]);

        // Pass services to the payment page
        $services = HotelService::all();

        // Show the dummy payment UI page
        return view('hotel.payment', compact('booking', 'dummySessionId', 'services'));
    }

    /**
     * Process the dummy payment confirmation.
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect()->route('dashboard')->with('error', 'Invalid payment session.');
        }

        // Find the booking by our dummy session ID
        $booking = Booking::where('stripe_session_id', $sessionId)->first();

        if (!$booking) {
            return redirect()->route('dashboard')->with('error', 'Booking not found for this session.');
        }

        // Ensure the user owns the booking
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Mark as paid and confirmed
        $booking->update([
            'payment_status'         => 'paid',
            'status'                 => 'confirmed',
            'stripe_payment_intent'  => 'DUMMY-INTENT-' . strtoupper(Str::random(12)),
        ]);

        // Generate PDF Invoice
        $services = HotelService::all();
        $pdf = Pdf::loadView('pdf.invoice', compact('booking', 'services'));
        
        // Save PDF temporarily
        $fileName = 'invoice_' . $booking->id . '_' . time() . '.pdf';
        $pdfPath = storage_path('app/public/' . $fileName);
        $pdf->save($pdfPath);

        // Send Email
        try {
            Mail::to($booking->user->email)->send(new BookingConfirmationMail($booking, $pdfPath));
        } catch (\Exception $e) {
            \Log::error('Mail could not be sent: ' . $e->getMessage());
        }

        return redirect()->route('dashboard')->with('success', '✅ Payment successful! Your booking for "' . $booking->room->name . '" is now confirmed. An invoice has been emailed to you.');
    }

    /**
     * Handle payment cancellation.
     */
    public function cancel()
    {
        return redirect()->route('dashboard')->with('error', 'Payment was cancelled. You can try again from your dashboard.');
    }
}
