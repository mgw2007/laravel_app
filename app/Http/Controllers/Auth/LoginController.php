<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * Where to redirect users after login.
         */
        $this->redirectTo = env("APP_PRODUCT", "/");

        $this->middleware('guest')->except('logout');
    }

    /**
     * The user has logged out of the application.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        return  redirect(env("APP_PRODUCT", "/"));
    }
}
