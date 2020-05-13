<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'ruler', 'status',
    ];

    protected $hidden = [
        'password',
    ];

}
