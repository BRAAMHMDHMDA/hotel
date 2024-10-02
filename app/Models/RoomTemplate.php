<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Validation\Rule;

class RoomTemplate extends Model
{
    use HasImage;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    static $imageDisk = 'media';
    static $imageFolder = 'room_templates';
//    protected $with = ['images', 'facilities', 'roomType'];

    protected $fillable = [
//        'roomType_id',
        'total_adult',
        'total_child',
        'capacity',
        'image_path',
        'price',
        'size',
        'view',
        'bed_style',
        'discount',
        'short_description',
        'description',
        'status',
    ];

    public static function rules($id=null) :array
    {
        return [
//            'name' => ['required', 'string', Rule::unique('room_templates', 'name')->ignore($id)],
//            'roomType_id' => 'required|exists:room_types,id',
            'total_adult' => 'required|integer|min:0',
            'total_child' => 'required|integer|min:0',
            'capacity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|min:0',
            'size' => 'required|integer|min:0',
            'view' => 'required|string',
            'bed_style' => 'required|string',
            'short_description' => 'required|string|min:5|max:255',
            'description' => 'required|string',
            'status' => 'nullable|in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
            'image' => 'nullable|image',
            'images' => 'nullable|array',
            'facilities' => 'required|array|min:1',
        ];
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class);
    }
    public function roomType() : BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
