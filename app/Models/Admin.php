<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, HasImage;

    static $imageDisk = 'media';
    static $imageFolder = 'admins';

    protected $fillable = [
        'name',
        'image_path',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function rules($id=null) :array
    {
//        $rules =  [
//            'name' => ['required', 'string', Rule::unique('admins', 'name')->ignore($id)],
//            'image' => 'nullable|image',
//            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($id)],
//            ];
        if ($id != null){
            return [
                'name' => ['required', 'string', Rule::unique('admins', 'name')->ignore($id)],
                'image' => 'nullable|image',
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($id)],
            ];
        }else{
            return [
                'name' => ['required', 'string', Rule::unique('admins', 'name')->ignore($id)],
                'image' => 'nullable|image',
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($id)],
                'password' => ["required" , 'string', 'confirmed','min:6']
            ];
        }
    }
}
