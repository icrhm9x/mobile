<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'name', 'slug', 'description', 'article', 'status', 'idAuthor', 'avatar', 'view',
    ];

    public function Member(){
        return $this->belongsTo('App\Models\Member', 'idAuthor', 'id');
    }
}
