<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'ruler', 'status',
    ];

    protected $hidden = [
        'password',
    ];

}
