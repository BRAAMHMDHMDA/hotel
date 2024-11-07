<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BlogPost;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('blog_category_id')->constrained('blog_categories')->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('admins')->cascadeOnDelete();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('image_path')->nullable();
            $table->string('short_description');
            $table->text('content');
            $table->enum('status', [BlogPost::STATUS_DRAFT, BlogPost::STATUS_PUBLISHED])->default(BlogPost::STATUS_DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
