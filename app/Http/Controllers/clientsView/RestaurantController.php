<?php

namespace App\Http\Controllers\clientsView;
use App\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('clients.restaurant.home', \compact('categories'));
    }
}
