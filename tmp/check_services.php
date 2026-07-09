<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\HotelService;

$all = HotelService::orderBy('id')->get();
foreach($all as $s) {
    echo "ID: " . $s->id . " | Title: " . $s->title . " | Icon: " . $s->icon . "\n";
}
