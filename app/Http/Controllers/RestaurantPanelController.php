<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TempOrder;
use App\ClientBill;
use App\Client;
use App\Historic;
use App\Events\SendOrderToRestaurant;

class RestaurantPanelController extends Controller
{
    public function __construct()
    {
        
    }

    public function panel(){
        return view('managers.generalManager.areaManager.restaurant.panel.panel');
    }

    public function chargeOnHotelAccount(Request $request){
        if (Auth::guard('client')->check()) {
            $state = ClientBill::create([ 
                'client_name' => Auth::guard('client')->user()->name,
                'client_lastname' => Auth::guard('client')->user()->lastname,
                'client_username' => Auth::guard('client')->user()->username,
                'hotel_account' => Auth::guard('client')->user()->hotel_account,
                'ordered' => $request->ordered,
                'total_order' => $request->total,
            ]);
                /* delete the temporal order before been paid */
            if ($state) {
                TempOrder::where('client_username',Auth::guard('client')->user()->username)->delete();
                $historic = Historic::findOrFail(Auth::guard('client')->user()->historic_id);
                
                $data = array(
                    'client_name' => Auth::guard('client')->user()->name,
                    'client_lastname' => Auth::guard('client')->user()->lastname,
                    'ordered' => $request->ordered,
                    'room' => $historic->room_id
                );

                return $this->sendToRestaurantPanel($data);
            
            }else {
                return response()->json([
                    "status" => 404, 
                ]);
            }
            
        }
    }

    public function sendToRestaurantPanel($data){
        $success = event(new SendOrderToRestaurant($data));
        return $success;
    }
}
