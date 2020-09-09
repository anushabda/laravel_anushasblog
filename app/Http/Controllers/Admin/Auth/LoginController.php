<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //  protected $redirectTo = '/admins';
    //protected $redirectTo = '/';
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        //Validate the form data
        $this->validateLogin($request);

        //Attempt to log the admin in
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)) {
            //If successful, redirect to their intendend location
            return redirect()->intended(route('admin.adminhome'));
        }

        //If unsuccessful return back to the login page with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
