<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class Testimonial extends Model
{
    use HasImage;
    static string $imageDisk = 'media';
    static string $imageFolder = 'testimonials';

    protected $fillable = [
        'name',
        'city',
        'image_path',
        'message',
    ];
    protected static function booted()
    {
        static::saved(fn()=> Cache::forget('testimonials'));
    }
    public static function rules($id=null) :array
    {
        return [
            'name' => ['required', 'string', Rule::unique('testimonials', 'name')->ignore($id)],
            'image' => 'nullable|image',
            'city' => 'required|string',
            'message' => 'required|string',
        ];
    }

}
