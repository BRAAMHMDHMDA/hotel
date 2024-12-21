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
        Schema::create('frequent_questions_area', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('short_title')->nullable();
            $table->string('main_title')->nullable();
            $table->text('description')->nullable();

            $table->string('first_question')->nullable();
            $table->string('first_answer')->nullable();

            $table->string('second_question')->nullable();
            $table->string('second_answer')->nullable();

            $table->string('third_question')->nullable();
            $table->string('third_answer')->nullable();

            $table->string('fourth_question')->nullable();
            $table->string('fourth_answer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frequent_questions_area');
    }
};
