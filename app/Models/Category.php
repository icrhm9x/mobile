<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name', 'slug', 'status',
    ];

    public function productTypes(){
        return $this->hasMany('App\Models\ProductType', 'idCategory', 'id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product', 'idCategory', 'id');
    }
}
