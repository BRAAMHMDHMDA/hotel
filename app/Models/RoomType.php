<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class RoomType extends Model
{
    use HasImage;
    static $imageDisk = 'media';
    static $imageFolder = 'room_types';

    protected $fillable = ['name', 'image_path'];

    public static function rules($id=null) :array
    {
        return [
            'name' => ['required', 'string', Rule::unique('team', 'name')->ignore($id)],
            'image' => 'nullable|image',
        ];
    }
}
