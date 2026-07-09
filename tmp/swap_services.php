<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HotelService;

$spa = HotelService::where('title', 'Spa & Fitness')->first();
$gym = HotelService::where('title', 'GYM & Yoga')->first();

if ($spa && $gym) {
    // Temporary swap buffers
    $spaData = [
        'icon' => $spa->icon,
        'title' => $spa->title,
        'short_description' => $spa->short_description
    ];
    $gymData = [
        'icon' => $gym->icon,
        'title' => $gym->title,
        'short_description' => $gym->short_description
    ];

    $spa->update($gymData);
    $gym->update($spaData);

    echo "Services swapped successfully.\n";
} else {
    echo "Error: One or both services ('Spa & Fitness', 'GYM & Yoga') not found in database.\n";
}
