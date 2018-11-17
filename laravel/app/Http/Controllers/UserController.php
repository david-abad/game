<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function index($id){
        //Obtener datos del usuario
        $user = DB::table('usuarios')->where("id", $id)->first();
        // Obtener los objetos
        $objetos = DB::table('objetos')->orderBy("costo", "asc")->get();
        /*Buscar todos los objetos que le pertenecen al usuario*/
        $compras = DB::select('select * from objetos inner join compras on objetos.id = compras.id_objetos where id_usuarios = '.$id);
        return view('index', ["users"=>$user, "compras"=>$compras, "objetos"=>$objetos])->with($bought=false);
    }
    public function cambiarAvatarNave($id, $avatar, $nave){
        // Actualizamos los campos avatar y nave del usuario
        DB::table('usuarios')->where('id', $id)->update(['avatar'=>$avatar, 'nave'=>$nave]);
        $response = new \stdClass(); //Para evitar error: Creating default object from empty value
        $response->result = 'Ok';
        $response->avatar = $avatar;
        $response->nave = $nave;
        echo json_encode($response);
    }
    public function subirDeNivel($id, $nivel){
        // Obtenemos los datos del usuario
        $usuario = DB::table('usuarios')->where('id', $id)->first();
        if($usuario->nivelActual == $nivel){
            // Si es la primera vez que gana este nivel, subimos de nivel
            DB::table('usuarios')->where('id', $id)->update(['nivelActual'=>$nivel+1]);
        }
        DB::table('usuarios')->where('id', $id)->increment('creditos', $nivel*10);
        $response = new \stdClass(); //Para evitar error: Creating default object from empty value
        $response->result = 'Ok';
        echo json_encode($response);
    }
}