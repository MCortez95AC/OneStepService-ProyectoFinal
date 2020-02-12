<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function area(){
        return $this->belongsTo(Area::class);
    }

    protected $fillable = [
        'area_id', 'name', 'price', 'description', 'category','image'
    ];
}
