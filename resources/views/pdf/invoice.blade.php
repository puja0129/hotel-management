<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice INV-{{ date('Y') }}-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.5;
            padding: 20px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            padding: 30px;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 8px;
            vertical-align: top;
        }
        .header td {
            padding-bottom: 20px;
        }
        .header td.title {
            font-size: 30px;
            font-weight: bold;
            color: #198754;
        }
        .header td.info {
            text-align: right;
        }
        .details-heading {
            background: #f8f9fa;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }
        .details-row td {
            border-bottom: 1px solid #eee;
        }
        .total-row td {
            font-weight: bold;
            font-size: 16px;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="header">
            <tr>
                <td class="title">
                    @php
                        $imagePath = public_path('img/logo.png');
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $src = 'data:image/png;base64,' . $imageData;
                    @endphp
                    <img src="{{ $src }}" alt="Grand Hotel" style="max-height: 60px;">
                </td>
                <td class="info">
                    <strong>Invoice Ref:</strong> INV-{{ date('Y') }}-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}<br>
                    <strong>Created:</strong> {{ date('d M Y') }}<br>
                    <strong>Due:</strong> Paid
                </td>
            </tr>
        </table>
        
        <table>
            <tr>
                <td>
                    <strong>Billed To:</strong><br>
                    {{ $booking->user->name }}<br>
                    {{ $booking->user->email }}
                </td>
                <td style="text-align: right;">
                    <strong>Hotel Address:</strong><br>
                    123 Luxury Lane<br>
                    Ahmedabad, Gujarat
                </td>
            </tr>
        </table>

        <br>
        
        <table>
            <tr class="details-heading">
                <td>Description</td>
                <td style="text-align: center;">Details</td>
                <td style="text-align: right;">Amount</td>
            </tr>
            <tr class="details-row">
                <td>
                    <strong>Room: {{ $booking->room->name ?? 'Standard Room' }}</strong><br>
                    <small>Guests: {{ $booking->adults }} Adults, {{ $booking->children }} Children</small>
                </td>
                <td style="text-align: center;">
                    {{ \Carbon\Carbon::parse($booking->check_in)->format('d M') }} 
                    to 
                    {{ \Carbon\Carbon::parse($booking->check_out)->format('d M y') }}
                    <br><small>({{ $booking->nights }} nights)</small>
                </td>
                <td style="text-align: right;">₹{{ number_format($booking->total_price, 2) }}</td>
            </tr>
            
            @if(isset($services) && count($services) > 0)
            <tr class="details-heading" style="background: transparent;">
                <td colspan="3" style="padding-top: 20px;"><strong>Included Services</strong></td>
            </tr>
            @foreach($services as $service)
            <tr class="details-row">
                <td colspan="2"><small>- {{ is_object($service) ? $service->title : $service['title'] }}</small></td>
                <td style="text-align: right;"><small>Included</small></td>
            </tr>
            @endforeach
            @endif

            <tr class="total-row">
                <td colspan="2" style="text-align: right;">Total Paid:</td>
                <td style="text-align: right; color: #198754;">₹{{ number_format($booking->total_price, 2) }}</td>
            </tr>
        </table>
        
        <br>
        <p style="text-align: center; color: #777; font-size: 12px; margin-top: 30px;">
            Thank you for choosing Grand Hotel. We hope you enjoy your stay!
        </p>
    </div>
</body>
</html>
