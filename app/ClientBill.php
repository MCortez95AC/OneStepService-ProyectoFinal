<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientBill extends Model
{
    protected $fillable = [
        'client_name', 'client_lastname', 'client_username', 'hotel_account','ordered','total_order'
    ];
}
