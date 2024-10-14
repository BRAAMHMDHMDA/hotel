<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    protected $fillable = [
        'code',
        'room_type_id',
        'user_id',
        'check_in',
        'check_out',
        'persons',
        'number_of_rooms',
        'total_night',
        'actual_price',
        'sub_total',
        'discount',
        'total_price',
        'payment_method',
        'payment_status',
        'transition_id',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'zip_code',
        'address',
        'status',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public static function rules() :array
    {
        return [
            'room_type_id' => 'required|exists:room_types,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'persons' => 'required|integer|min:1',
            'number_of_rooms' => 'required|integer|min:1',
            'total_night' => 'required|integer|min:1',
            'actual_price' => 'required|numeric|min:0',
            'sub_total' => 'required|numeric|min:0',
            'discount' => 'required|integer',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
        ];
        /*
         * 'room_type_id' => 'required|exists:roomTypes,id',
            'user_id' => 'required|exists:users,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
            'persons' => 'required|integer|min:1',
            'number_of_rooms' => 'required|integer|min:1',
            'total_night' => 'required|integer|min:1',
            'actual_price' => 'required|numeric|min:0',
            'sub_total' => 'required|numeric|min:0',
            'discount' => 'required|integer|min:0|max:100',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'payment_status' => 'nullable|string',
            'transition_id' => 'nullable|string',
         */
    }

    protected static function booted()
    {
        static::creating(function ($booking) {
            $booking->user_id = Auth::guard('web')->user()->id;
            $booking->code = self::generateBookingCode();
        });
    }

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }

    private static function generateBookingCode()
    {
        // Generate a unique booking code (e.g., "BOOK-2024-00123")
        $prefix = 'BOOK';
        $timestamp = now()->format('Y-m-d'); // Current date
        $uniqueId = str_pad(Booking::count() + 1, 5, '0', STR_PAD_LEFT); // Incremental ID

        return "{$prefix}-{$timestamp}-{$uniqueId}";
    }

}
