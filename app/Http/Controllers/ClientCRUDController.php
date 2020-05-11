<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Room;
use App\Client;
use App\Historic;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'required|string|max:30|min:3',
            'lastName' => 'required|string|max:30|min:3',
            'email' => 'unique:clients',
            'room' => 'required',
            'username' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function index()
    {
        $clients = Client::all();
        return view('managers.generalManager.clients.index', compact('clients'));
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

            /* Update room to disable */
                $selectedRoom= Room::findOrFail($request->roomId);
                $selectedRoom->available = 0;
                $selectedRoom->save();
            /* Create the client request */
            Client::create([
                'historic_id' => $historic_id,
                'name' => $request->name,
                'lastname' => $request->lastName,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'hotel_account' => $request->hotelAccount
            ]);
            return response()->json([
                "status" => 200, 
                "Message" => $request->hotelAccount
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
        $client = Client::findOrFail($id);
        $rooms = Room::all();
        $historic = Historic::findOrFail($client->historic_id);

        return view('managers.generalManager.clients.edit', compact('client', 'rooms', 'historic'));
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
        $client = Client::findOrFail($id);
        $historic = Historic::findOrFail($client->historic_id);
        $Newroom = Room::findOrFail($request->roomNumber);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index')->with('info','Client delete successfully');
    }
}
