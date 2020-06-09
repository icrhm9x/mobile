<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $fillable =  [
        'idCategory', 'name', 'slug', 'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'idCategory', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'idProductType', 'id');
    }
}
