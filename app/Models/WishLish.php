<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishLish extends Model
{
    protected $table = 'wish_list';

    protected $fillable = [
        'idProduct',
        'idUser'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idProduct', 'id');
    }
}
