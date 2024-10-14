<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rule;

class Room extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    protected $fillable = ['number', 'room_type_id', 'status'];

    public static function rules($id=null) :array
    {
        return [
            'number' => ['required', 'string', Rule::unique('rooms', 'number')->ignore($id)],
            'status' => 'nullable|in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
            'room_type_id' => 'required|exists:room_types,id'
        ];
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', self::STATUS_ACTIVE);
    }


    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class);
    }



}
