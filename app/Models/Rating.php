<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable =  [
        'idProduct', 'idUser', 'number', 'content',
    ];
    
    public function User(){
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }

    public function Product(){
        return $this->belongsTo('App\Models\Product', 'idProduct', 'id');
    }
}
