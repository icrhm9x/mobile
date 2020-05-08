<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'idUser', 'name', 'address', 'phone', 'totalMoney', 'message', 'status',
    ];

    public function User(){
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }
}
