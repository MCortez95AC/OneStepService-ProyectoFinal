<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantPanelController extends Controller
{
    public function panel(){
        return view('managers.generalManager.areaManager.restaurant.panel.panel');
    }
}
