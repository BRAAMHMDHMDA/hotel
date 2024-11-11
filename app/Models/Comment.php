<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';

    protected $fillable = ['content','post_id', 'status'];

    protected $with = ['user'];

    protected static function booted(): void
    {
        static::creating(function ($comment) {
            $comment->user_id = Auth::guard('web')->user()->id;
        });
    }
    public function scopeActive(Builder $builder): void
    {
        $builder->where('status', '=', self::STATUS_ACTIVE);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class, 'post_id');
    }

}
