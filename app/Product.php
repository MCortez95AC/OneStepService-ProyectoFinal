<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        'area_id', 'name', 'price', 'description', 'category','image'
    ];
}
