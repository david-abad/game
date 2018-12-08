<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
   /* protected function redirectTo(){

         $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
            $url = $usuario->id;
            return '/login/'. $url;
    }*/
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        date_default_timezone_set('America/Mexico_City');
        $hoy = date("Y-m-d");
        
             //$hoy = date("Y-m-d");
            /* DB::table('usuarios')->insertGetID([
             'nombre' => $data['name'],
             'password' => Hash::make($data['password']),
             'ultimoLogin' => $hoy
             ]);
            $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
            $url = $usuario->id;
            $idk = '/login/' .$url;*/
            //return redirect ($idk);x
            
            $createUser = User::firstOrCreate([
            'nombre' => $data['name']
            ],  [
            'password' => $data['password'],
            
            
            'ultimoLogin' => $hoy
            ]
        );
            auth()->login($createUser);
            //CREAR IF POR SI ES LA PRIMERA VEZ
            $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
             $url = $usuario->id;
             User::create([
            'nombre' => $data['name'],
            'password' => $data['password'],
            'ultimoLogin' => $hoy,

             ]);
             //return redirect('/login/$url');
            /*
             return User::create([
            'nombre' => $data['name'],
            'password' => $data['password'],
            'ultimoLogin' => $hoy,

             ]);*/
            
            


             /* $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
            $url = $usuario->id;
            $idk = '/login/' .$url;*/
            //return redirect()->route('login',['id' => $url]);
         
            //return redirect ('/home');
            //echo "USUARIO YA REGISTRADO";

        

          /*  date_default_timezone_set('America/Mexico_City');
        if(DB::table('usuarios')->where('nombre', $data['name'])->doesntExist())
        {
             $hoy = date("Y-m-d");
             DB::table('usuarios')->insertGetID([
             'nombre' => $data['name'],
             'password' => Hash::make($data['password']),
             'ultimoLogin' => $hoy
             ]);
            $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
            $url = $usuario->id;
            return redirect ('/login/$url')->with('alert',"Bienvenido $createUser->name");
        }
        else
        {
            return redirect ('/home');
        }*/


    }
  /*  public function registro()
    {
        date_default_timezone_set('America/Mexico_City');
        if(DB::table('usuarios')->where('nombre', $data['name'])->doesntExist())
        {
        $hoy = date("Y-m-d");
          DB::table('usuarios')->insertGetID([
            'nombre' => $data['name'],
            'password' => Hash::make($data['password']),
            'ultimoLogin' => $hoy
            ]);
          $usuario = DB::table('usuarios')->where("nombre", $data['name'])->first();
        $url = $usuario->id;
          return redirect ('/login/$url')->with('alert',"Bienvenido $createUser->name");
        }
        else{
            return redirect ('/home');
        }

    }*/
}
