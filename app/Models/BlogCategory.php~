<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategory extends Model
{
    protected $fillable = ['name', 'slug'];

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
}
