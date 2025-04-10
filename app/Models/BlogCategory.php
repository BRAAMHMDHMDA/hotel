<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    protected static function booted()
    {
        static::saved(fn()=> Cache::forget('random5_blog_categories'));
    }
    // Rules
    public static function rules($id=null) :array
    {
        return ['name' => ['required', 'string', Rule::unique('blog_categories', 'name')->ignore($id)],];
    }
    public function setNameAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = Str::title($value);
    }
    //posts
    public function posts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }
}
