<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username()
    {

        return 'nombre';
    }

    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    protected function authenticate(Request $request)
    {

        $credentials = $request->only('nombre','password');
        dd($credentials);
      if(User::attempt($credentials))
        {
            return redirect() -> intended('register');
        }

      /*  return [
            'nombre' => $login,
            'password' => $request->input('password')
        ];*/
    }
}
