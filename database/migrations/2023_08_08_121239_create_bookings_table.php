<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('concert_id');
            $table->enum('seat_position', ['vip_seat', 'premium_seat', 'regular_seat']);
            $table->unsignedInteger('no_of_tickets');
            $table->unsignedInteger('total_price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('concert_id')->references('id')->on('concerts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
