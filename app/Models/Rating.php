<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable =  [
        'idProduct', 'idUser', 'number', 'comment',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'idUser', 'id');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'idProduct', 'id');
    }
}
