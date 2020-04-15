<?php

namespace App\Http\Controllers\clientsView;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        return view('clients.home');
    }
}
