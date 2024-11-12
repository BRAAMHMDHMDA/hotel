<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Gallery extends Model
{
    use HasImage;
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';
    static $imageDisk = 'media';
    static $imageFolder = 'gallery';
    protected $table = 'gallery';

    protected $fillable = ['image_path','description', 'status'];

    public function scopeActive(Builder $builder): void
    {
        $builder->where('status', '=', self::STATUS_ACTIVE);
    }
}
