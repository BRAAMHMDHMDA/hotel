<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RoomTemplate;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roomType_id')->constrained('room_types')->restrictOnDelete();
            $table->integer('total_adult')->nullable();
            $table->integer('total_child')->nullable();
            $table->integer('capacity')->nullable();
            $table->string('image_path')->nullable();
            $table->double('price')->unsigned()->nullable();
            $table->integer('size')->unsigned()->nullable();
            $table->string('view')->nullable();
            $table->string('bed_style')->nullable();
            $table->integer('discount')->unsigned()->default(0);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', [RoomTemplate::STATUS_ACTIVE, RoomTemplate::STATUS_DRAFT])->default(RoomTemplate::STATUS_DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_templates');
    }
};
