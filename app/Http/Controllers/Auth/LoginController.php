<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/super';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:worker')->except('logout');
            $this->middleware('guest:client')->except('logout');
    }

    //This is the code with the user con login with username
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function showWorkerLoginForm()
    {
        return view('auth.login', ['url' => 'Admin Worker']);
    }

    public function workerLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|string',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('worker')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/worker');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function showClientLoginForm()
    {
        return view('auth.login', ['url' => 'Wellcome to LSHotel ']);
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|string',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('client')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/client');
        }
        return back()->withInput($request->only('username', 'remember'));
    }
}