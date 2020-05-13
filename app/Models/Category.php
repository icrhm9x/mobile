<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'status',
    ];
    
    public function productType(){
        return $this->hasMany('App\Models\ProductType', 'idCategory', 'id');
    }

    public function Product(){
        return $this->hasMany('App\Models\Product', 'idCategory', 'id');
    }
}
