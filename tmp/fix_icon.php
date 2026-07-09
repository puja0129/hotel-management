<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HotelService;

$service = HotelService::where('title', 'Sports & Gaming')->first();
if ($service) {
    $service->update(['icon' => 'fa-swimming-pool']);
    echo "Updated icon to fa-swimming-pool successfully.\n";
} else {
    echo "Error: Service 'Sports & Gaming' not found in database.\n";
}
