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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
