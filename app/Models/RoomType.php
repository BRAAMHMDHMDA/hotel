<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoomType extends Model
{
    use HasImage;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    static $imageDisk = 'media';
    static $imageFolder = 'room_types';

    protected $fillable = [
        'name',
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
    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = Str::title($value);
    }
    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', self::STATUS_ACTIVE);
    }

    public function availableRooms($checkIn, $checkOut)
    {
        return $this->rooms()->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                        $query->where('check_in', '<', new \DateTime($checkOut))
                            ->where('check_out', '>', new \DateTime($checkIn));
                    });
    }
    public function scopeWithAvailableRooms($query, $checkIn=null, $checkOut=null)
    {
        if (is_null($checkIn) && is_null($checkOut)){
            return $query->withCount(['rooms as available_rooms']);
        }else{
            return $query->withCount(['rooms as available_rooms' => function ($query) use ($checkIn, $checkOut) {
                $query->whereDoesntHave('bookings', function ($query) use ($checkIn, $checkOut) {
                    $query->where('check_in', '<', new \DateTime($checkOut))
                        ->where('check_out', '>', new \DateTime($checkIn));
                });
            }]);
        }
    }

    public static function rules($id=null) :array
    {
        return [
            'name' => ['required', 'string', Rule::unique('room_types', 'name')->ignore($id)],
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
            'status' => 'required|in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
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

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

}
