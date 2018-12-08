<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;

use Socialite;

class SocialController extends Controller
{
    //

    public function redirect($provider)
    {

    	return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
    	
                date_default_timezone_set('America/Mexico_City');
        
        $hoy = date("Y-m-d");
    	$user = Socialite::driver($provider)->user();
    	$createUser = User::firstOrCreate([
    		'nombre' => $user-> getEmail()
			],  [
			'password' => $user-> getEmail(),
            'ultimoLogin' =>  $hoy
			]);

        if(DB::table('usuarios')->where('nombre', $user-> getEmail())->doesntExist()){
             DB::table('usuarios')->insertGetID([
            'nombre' => $user-> getEmail(),
            'password' => $user-> getEmail(),
            'ultimoLogin' => $hoy
            ]);
             return redirect ($url);
           //  $usuario = DB::table('usuarios')->where("nombre", $createUser->email)->first();
        //$url = $usuario->id;

        

        }
        else{
             $usuario = DB::table('usuarios')->where("nombre", $user->getEmail())->first();
             $url = $usuario->id;
        return redirect ($url);
        }

    	//auth()->login($createUser);
    	

    }
}
