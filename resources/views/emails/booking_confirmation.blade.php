<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('img/logo.png') }}" alt="Grand Hotel Logo" style="max-height: 60px;">
        </div>
        <h2 style="color: #198754; text-align: center;">Booking Confirmed!</h2>
        
        <p>Dear {{ $booking->user->name }},</p>
        
        <p>Thank you for choosing Grand Hotel. We are thrilled to confirm your reservation and have successfully processed your payment.</p>
        
        <div style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <h3 style="margin-top: 0; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Reservation Details</h3>
            <p><strong>Booking Ref:</strong> BKG-{{ \Carbon\Carbon::parse($booking->created_at ?? now())->format('Y') }}-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
            <p><strong>Room:</strong> {{ $booking->room->name ?? 'Standard Room' }}</p>
            <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('F d, Y') }} (After 2:00 PM)</p>
            <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('F d, Y') }} (Before 11:00 AM)</p>
            <p><strong>Guests:</strong> {{ $booking->adults }} Adult(s), {{ $booking->children }} Child(ren)</p>
            <p><strong>Total Paid:</strong> ₹{{ number_format($booking->total_price, 2) }}</p>
        </div>
        
        <p>An invoice for your payment has been attached to this email as a PDF.</p>
        
        <p>If you have any questions or require modifications to your booking, please don't hesitate to reply to this email or call our front desk at +91 79 1234 5678.</p>
        
        <p>We look forward to welcoming you to Grand Hotel!</p>
        
        <div style="text-align: center; margin-top: 30px; font-size: 12px; color: #777;">
            <p>&copy; {{ date('Y') }} Grand Hotel. All rights reserved.</p>
            <p>123 Luxury Lane, Ahmedabad, Gujarat</p>
        </div>
    </div>
</body>
</html>
