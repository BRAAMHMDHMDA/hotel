<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class Team extends Model
{
    use HasImage;

    protected $table = 'team';
    static $imageDisk = 'media';
    static $imageFolder = 'team';

    protected $fillable = [
        'name',
        'image_path',
        'position',
        'facebook',
    ];
    protected static function booted()
    {
        static::saved(fn()=> Cache::forget('team'));
    }
    public static function rules($id=null) :array
    {
        return [
            'name' => ['required', 'string', Rule::unique('team', 'name')->ignore($id)],
            'image' => 'nullable|image',
            'position' => 'required|string',
            'facebook' => 'required|url',
        ];
    }
}
