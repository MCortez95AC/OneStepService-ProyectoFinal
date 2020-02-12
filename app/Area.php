<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //relationship many to many areas-workers
    public function workers(){
        return $this->belongsToMany(Worker::class);
    }

    //Realcion area-producto
    public function products(){
        return $this->hasMany(Product::class);
    } 
}
