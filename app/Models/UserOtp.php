<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = ['user_id', 'user_phone', 'otp', 'expire_at'];

    /**
     * Write code on Method
     *
     * @return response()
     */
}