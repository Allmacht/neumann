<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::whereEmail($email)->value('status');
        if(is_null($user)):
            return redirect()->route('login')->withErrors(['email'=>'Usuario y/o contraseña incorrectos']);
        endif;

        if($user == false):
            return redirect()->route('login')->withErrors(['email'=>'Usuario desactivado, contacte al administrador']);
        else:
            if(Auth::attempt(['status' => 1,'email' => $email, 'password' => $password])):
                return redirect()->intended('home');
            else:
                return redirect()->route('login')->withErrors(['email'=>'Usuario y/o contraseña incorrectos']);
            endif;
        endif;
    }
}
