<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $fillable = [
        'id', 'entry_date', 'entry_date', 'room_id'
    ];
}
