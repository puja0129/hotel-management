<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->default(0)->after('children');
            $table->string('payment_status')->default('unpaid')->after('total_price'); // unpaid, paid, refunded
            $table->string('stripe_session_id')->nullable()->after('payment_status');
            $table->string('stripe_payment_intent')->nullable()->after('stripe_session_id');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'payment_status', 'stripe_session_id', 'stripe_payment_intent']);
        });
    }
};
