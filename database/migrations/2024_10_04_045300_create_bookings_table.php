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
            $table->string('code')->unique();
            $table->foreignId('room_type_id')->constrained('room_types')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedInteger('persons');
            $table->unsignedInteger('number_of_rooms');

            $table->unsignedInteger('total_night');
            $table->unsignedFloat('actual_price');
            $table->unsignedFloat('sub_total');
            $table->unsignedInteger('discount')->default(0);
            $table->unsignedFloat('total_price');

            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('transition_id')->nullable();

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('state');
            $table->string('zip_code');
            $table->string('address');
            $table->string('status')->default('pending');

            $table->timestamps();
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
