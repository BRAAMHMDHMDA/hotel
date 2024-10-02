<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Validation\Rule;

class Room extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    protected $fillable = ['number', 'room_template_id', 'status'];

    public static function rules($id=null) :array
    {
        return [
            'number' => ['required', 'string', Rule::unique('rooms', 'number')->ignore($id)],
            'status' => 'nullable|in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
            'room_template_id' => 'required|exists:room_templates,id'
        ];
    }

    public function roomTemplate(): BelongsTo
    {
        return $this->belongsTo(RoomTemplate::class);
    }

    // Relationship to get RoomType through RoomTemplate
    public function roomType(): BelongsTo
    {
        return $this->roomTemplate->roomType();
    }

    public function nameRoomType()
    {
        return $this->roomTemplate->roomType()->select('name');
    }

}
