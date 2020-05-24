<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  [
        'name', 'slug', 'description', 'article', 'quantity', 'price', 'promotion', 'img_name', 'img_path', 'hot', 'idCategory', 'idProductType', 'status',
    ];

    public function ProductType(){
        return $this->belongsTo('App\Models\ProductType', 'idProductType', 'id');
    }

    public function Category(){
        return $this->belongsTo('App\Models\Category', 'idCategory', 'id');
    }

    public function Rating(){
        return $this->hasMany(Role::class, 'idProduct', 'id');
    }

}
