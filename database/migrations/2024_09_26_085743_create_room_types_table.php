<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RoomType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedInteger('total_adult');
            $table->unsignedInteger('total_child');
            $table->unsignedInteger('capacity');
            $table->string('image_path');
            $table->unsignedFloat('price');
            $table->string('size');
            $table->string('view');
            $table->string('bed_style');
            $table->unsignedInteger('discount')->default(0);
            $table->text('short_description');
            $table->text('description');
            $table->enum('status', [RoomType::STATUS_ACTIVE, RoomType::STATUS_DRAFT])->default(RoomType::STATUS_DRAFT);
            $table->timestamps();
        });
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('room_type_id')->constrained('room_types')->restrictOnDelete();
            $table->enum('status', [Room::STATUS_ACTIVE, Room::STATUS_DRAFT])->default(Room::STATUS_DRAFT);
            $table->timestamps();
        });
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
        Schema::create('booking_room', function (Blueprint $table) {
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();

            $table->primary(['booking_id', 'room_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
