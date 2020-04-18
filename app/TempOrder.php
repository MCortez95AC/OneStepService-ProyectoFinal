<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    protected $fillable = [
        'client_username','name', 'price', 'quantity', 'image'
    ];
}
