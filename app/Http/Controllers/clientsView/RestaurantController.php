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
        $products = TempOrder::all()->where('client_username',Auth::guard('worker')->user()->username);
        return view('clients.restaurant.myOrder', \compact('products'));
    }

    public function newTempOrder(Request $request){
            TempOrder::create([
                'client_username' => Auth::guard('worker')->user()->username,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $request->image
            ]);
            return response()->json([
                "message" => "Created"
            ]);
    }

}
