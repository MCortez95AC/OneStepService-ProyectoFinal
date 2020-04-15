<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Room;
use App\Client;
use App\Historic;
use Illuminate\support\Str;

class ClientCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('guest:client');
    }
    protected function validatorClient(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:clients',
            'email' => 'unique:clients',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function index()
    {
        return view('managers.generalManager.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('managers.generalManager.clients.registerclient', ['url' => 'client', 'rooms' => $rooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatorClient($request->all())->validate();
        if($request->ajax()){
            /* Get the last insert in the histori table and then
            get the ID and plus is 1 to asign the new historic register table
            and the historic_id tothe client */

            $lastHistoric= Historic::all();
            $historic_id = $lastHistoric->last()->id+1;

            /* Create a Historic to asign to client */
            Historic::create([
                'id'=> $historic_id,
                'entry_date' => date('Y-m-d H:i:s'),
                'departure_date' => null,
                'room_id' => $request->roomId
            ]);
            /* Create the client request */
            Client::create([
                'historic_id' => $historic_id,
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'hotel_account' => $request->name.Str::random(2)
            ]);
            return response()->json([
                "mensaje" => $request->roomId
            ]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
