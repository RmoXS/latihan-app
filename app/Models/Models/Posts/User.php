<?php

namespace App\Models\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "name","email","password",
        ];
    
    protected $hidden = [
        "password",
        "remeber_token",
        ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];        
}
