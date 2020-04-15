<?php

namespace App\Http\Controllers\clientsView;
use App\Category;
use App\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index($category = 'Menu'){
        $categories = Category::all();
        $products = Product::all()->where('category',$category);
        return view('clients.restaurant.home', \compact('categories','products'));
    }

    public function myOrder(){
        return view('clients.restaurant.myOrder');
    }
}
