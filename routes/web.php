<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;

// 1. Home Page (Linked to Controller to show Rooms)
Route::get('/', [HotelController::class, 'index'])->name('home');

// 2. Hotel Frontend Pages
Route::get('/about', [HotelController::class, 'about'])->name('about');
Route::get('/gallery', [HotelController::class, 'gallery'])->name('gallery');
Route::get('/rooms', [HotelController::class, 'rooms'])->name('rooms');
// Services module routes (rich detail pages via ServiceController)
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/team', [HotelController::class, 'team'])->name('team');
Route::get('/testimonials', [HotelController::class, 'testimonials'])->name('testimonials');
Route::get('/contact', [HotelController::class, 'contact'])->name('contact');
Route::post('/contact', [HotelController::class, 'contactStore'])->name('contact.store');

// Detail Pages for Rooms & Services
Route::get('/room/{id}', [HotelController::class, 'roomDetail'])->name('room.detail');
Route::get('/service/{id}', [HotelController::class, 'serviceDetail'])->name('service.detail');

// 3. Authenticated User Routes
Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Booking Pages
    Route::get('/booking', function () {
        $rooms = App\Models\Room::where('is_available', true)->get();
        return view('hotel.booking', compact('rooms'));
    })->name('booking');

    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::patch('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    
    // Payment (Stripe) route placeholders
    Route::get('/payment/checkout/{booking}', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');

    // Invoice View
    Route::get('/booking/{booking}/invoice', [App\Http\Controllers\UserInvoiceController::class, 'preview'])->name('booking.invoice');
    Route::get('/booking/{booking}/invoice/pdf', [App\Http\Controllers\UserInvoiceController::class, 'downloadPdf'])->name('booking.invoice.pdf');
});

// 4. Admin Backend Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    
    // Rooms CRUD
    Route::resource('rooms', App\Http\Controllers\Admin\RoomController::class);
    
    // Services CRUD
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);

    // CMS / Website Content
    Route::resource('carousels', App\Http\Controllers\Admin\CarouselController::class);
    Route::resource('team-members', App\Http\Controllers\Admin\TeamController::class)->parameters([
        'team-members' => 'teamMember',
    ]);
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
    
    // Bookings Management
    Route::get('bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('bookings.show');
    Route::patch('bookings/{booking}/status', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('bookings.status');
    Route::put('bookings/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('bookings.update');
    
    // Amenities CRUD
    Route::resource('amenities', App\Http\Controllers\Admin\AmenityController::class);
});

// 4. Breeze Dashboard & Profile

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
