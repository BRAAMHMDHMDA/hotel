<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
            'name' => ['required', 'string', Rule::unique('room_types', 'name')->ignore($id)],
            'image' => 'nullable|image',
        ];
    }
    public function roomTemplate() : HasOne
    {
        return $this->hasOne(RoomTemplate::class);
    }

    public function roomTemplateIsComplete()
    {
        return $this->roomTemplate()->whereNotNull('price')->exists();
    }
}
