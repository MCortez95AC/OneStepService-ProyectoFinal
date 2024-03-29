<?php

namespace App\Http\Controllers;
use App\User;
use App\Worker;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
/* use Illuminate\Foundation\Auth\RegistersUsers; */
use Illuminate\Http\Request;


class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:worker');
    }

    /* validate correct information */
    protected function validatorIfIsAdmin(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:50',
            'lastname' => 'required|string|max:30|min:3',
            'email' => 'required|string|email|max:50|unique:users',
            'username' => 'required|string|max:20|min:3|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'dni' => 'required'
        ]);
    }

    protected function validatorIfNotAdmin(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30|min:3',
            'lastname' => 'required|string|max:30|min:3',
            'email' => 'required|string|email|max:50|unique:users',
            'dni' => 'required'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all()->where('area','Restaurant');
        return view('managers.generalManager.areaManager.restaurant.workers.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.generalManager.areaManager.restaurant.workers.registerworker', ['url' => 'worker']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){  
        //if the request is sending by restaunrant the Worker area will be RESTAURANT else ROOM SERVICE
        if ($request->is('admin/restaurant/*')) {
            if ($request->input('isAdmin') === 'Yes') {
                $this->validatorIfIsAdmin($request->all())->validate();
                Worker::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'username' => $request->username,
                    'area' => 'Restaurant',
                    'is_admin' => 1,
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->route('workers.index')->with('info','Admin Restaurant Worker created successfully');
            } else{
                $this->validatorIfNotAdmin($request->all())->validate();
                Worker::create([
                    'name' => $request->name,
                    'lastname' => $request->lastname,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'area' => 'Restaurant',
                    'is_admin' => 0,
                ]);
                return redirect()->route('workers.index')->with('info','Restaurant Worker created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
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
        $worker = Worker::findOrFail($id);
        return view('managers.generalManager.areaManager.restaurant.workers.edit',compact('worker'));
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
        $worker = Worker::findOrFail($id);

        $worker->name = $request->name;
        $worker->lastname = $request->lastname;
        $worker->dni = $request->dni;
        $worker->email = $request->email;
        $worker->save();
        return redirect()->route('workers.index')->with('info','Worker updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::findOrFail($id);
        $worker->delete();
        return redirect()->route('workers.index')->with('info','Worker delete successfully');
    }
}
