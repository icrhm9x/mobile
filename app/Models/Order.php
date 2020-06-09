<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'idUser', 'name', 'address', 'phone', 'totalMoney', 'message', 'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'idOrder');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'order_details', 'idOrder', 'idProduct');
    }
}
