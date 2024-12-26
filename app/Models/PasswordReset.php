<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    public $table = "password_reset_tokens";
    public $timestamps = false;
    // Define the primary key
    protected $primaryKey = 'email';

    // Define attributes that are not mass assignable
    protected $guarded = ['id'];
//    protected $fillable=[
//        'email',
//        'token',
//        'created_at',
//    ];
}
