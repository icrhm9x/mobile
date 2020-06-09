<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  [
        'name', 'slug', 'description', 'article', 'quantity', 'price', 'promotion', 'img_name', 'img_path', 'hot', 'idCategory', 'idProductType', 'status',
    ];

    public function productType(){
        return $this->belongsTo('App\Models\ProductType', 'idProductType', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category', 'idCategory', 'id');
    }

    public function ratings(){
        return $this->hasMany(Role::class, 'idProduct', 'id');
    }

}
