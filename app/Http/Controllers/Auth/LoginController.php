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
        $this->middleware('guest:client')->except('logout');
        $this->middleware('guest:worker')->except('logout');
            
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
        return view('auth.login', ['url' => 'worker']);
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
        if (Auth::guard('client')) {
            $message = "Ooops! someone is in the wrong login, please go to your login.";
        }

        return back()->withInput($request->only('username', 'remember'))->with('info',$message);
    }

    public function showClientLoginForm()
    {
        return view('auth.login', ['url' => 'client']);
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required|string',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('client')->attempt($credentials, $request->get('remember'))) {

            return redirect()->intended('/client/home');
        }
        if (Auth::guard('worker')) {
            $message = "You´re trying login like a admin, please go to your admin login.";
        }

        return back()->withInput($request->only('username', 'remember', 'info','No matches'))->with('info',$message);
    
    }
}