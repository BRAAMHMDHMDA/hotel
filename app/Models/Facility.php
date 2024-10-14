<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Validation\Rule;

class Facility extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function rules($id = null): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('facilities', 'name')->ignore($id)],
        ];
    }

    public function roomTypes(): BelongsToMany
    {
        return $this->belongsToMany(RoomType::class);

    }
}
