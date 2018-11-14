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
        $objetos = DB::table('objetos')->get();
        /*Buscar todos los objetos que le pertenecen al usuario*/
        $compras = DB::select('select * from objetos inner join compras on objetos.id = compras.id_objetos where id_usuarios = '.$id);
        return view('index', ["users"=>$user, "compras"=>$compras, "objetos"=>$objetos]);
   }
}
