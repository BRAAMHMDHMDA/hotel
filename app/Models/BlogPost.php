<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogPost extends Model
{
    use HasImage;

    static $imageDisk = 'media';
    static $imageFolder = 'blog_posts';
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    protected $fillable = ['title', 'image_path', 'short_description', 'content', 'status', 'blog_category_id'];
    // Rules
    public static function rules($id=null) :array
    {
        return [
            'title' => ['required', 'string', Rule::unique('blog_posts', 'title')->ignore($id)],
            'image' => 'nullable|image',
            'short_description' => 'required|string|min:5|max:255',
            'content' => 'required|string',
            'status' => 'nullable|in:'. self::STATUS_DRAFT .','. self::STATUS_PUBLISHED,
            'blog_category_id' => 'required|exists:blog_categories,id',
            ];
    }

    protected static function booted(): void
    {
        static::creating(function ($post) {
            $post->created_by = Auth::guard('admin')->user()->id;
        });

        static::saved(fn()=>Cache::forget('blog_posts'));
        static::saved(fn()=> Cache::forget('random3_blog_posts'));

    }
    public function scopePublished(Builder $builder): void
    {
        $builder->where('status', '=', self::STATUS_PUBLISHED);
    }
    public function setTitleAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['title'] = Str::title($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

     public function comments(): HasMany
     {
        return $this->hasMany(Comment::class, 'post_id')->active();
     }

}
