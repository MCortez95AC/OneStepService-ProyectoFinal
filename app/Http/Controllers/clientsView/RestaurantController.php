<?php

namespace App\Http\Controllers\clientsView;
use App\Category;
use App\Product;
use Auth;
use App\TempOrder;

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
        /* if(Auth::guard("worker")->check()){
            if (Auth::guard('worker')->user()->username === "client") {
                return Auth::guard('worker')->user()->username;
            }
        } */
    }

    public function newTempOrder(Request $request){
            TempOrder::create([
                'client_username' => Auth::guard('worker')->user()->username,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'image' => $request->image
            ]);
            return response()->json([
                "message" => "Created"
            ]);
    }

}
