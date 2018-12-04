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
        // Determinar si el usuario obtendrá recompensa o no
        // Si diaRecompensa = 1 o ultimoLogin = hoy - 1, entonces obtiene recompensa.
        // Si diaRecompensa+1 = 7, hay recompensa y diaRecompensa = 1
        // Si ultimoLogin != hoy - 1 u hoy, entonces diaRecompensa = 1
        date_default_timezone_set('America/Mexico_City');
        $ultimoLogin = date($user->ultimoLogin);
        $hoy = date("Y-m-d");
        $recompensa = false;
        $recibida = true;
        if($hoy != $ultimoLogin){
            $recibida = false;
        }
        if(($user->diaRecompensa == 1 || $ultimoLogin == date("Y-m-d", strtotime("-1 day"))) && !$recibida){
            $recompensa = true;
        }
        $dia = $user->diaRecompensa;
        if($recompensa && !$recibida){
            $dia = $user->diaRecompensa + 1;
        }else{
            $dia = 1;
        }
        if($dia == 8){
            $dia = 1;
        }
        DB::table('usuarios')->where("id", $id)->update(['diaRecompensa'=>$dia, 'ultimoLogin'=>$hoy]);
        if($recompensa){
            $add = 0;
            if($dia == 1){
                $add = 100;
            }else if($dia < 5){
                $add = 150;
            }else if($dia < 7){
                $add = 200;
            }else{
                $add = 300;
            }
            DB::table('usuarios')->where("id", $id)->increment('creditos', $add);
        }
        //Obtener datos del usuario
        $user = DB::table('usuarios')->where("id", $id)->first();
        return view('home', ["users"=>$user, "compras"=>$compras, "objetos"=>$objetos, "recompensa"=>$recompensa])->with([$bought=false]);
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
            $nuevoNivel = $nivel + 1;
            if($nuevoNivel == 11){
                $nuevoNivel = 10;
            }
            DB::table('usuarios')->where('id', $id)->update(['nivelActual'=>$nuevoNivel]);
        }
        DB::table('usuarios')->where('id', $id)->increment('creditos', ($nivel*5)+10);
        $response = new \stdClass(); //Para evitar error: Creating default object from empty value
        $response->result = 'Ok';
        echo json_encode($response);
    }
    public function reiniciar($id){
        //Asignamos a 1 el nivel actual del usuario
        DB::table('usuarios')->where('id', $id)->update(['nivelActual'=>1]);
        $response = new \stdClass(); //Para evitar error: Creating default object from empty value
        $response->result = 'Ok';
        echo json_encode($response);
    }
    public function comprar($id, $id_obj){
        // Buscamos el objeto al que pertenece el id_obj
        $objeto = DB::table('objetos')->where('id', $id_obj)->first();
        // Actualizamos el número de créditos del usuario
        DB::table('usuarios')->where('id', $id)->decrement('creditos', $objeto->costo);
        // Insertamos la compra del objeto
        DB::table('compras')->insert(
            ['id_usuarios' => $id, 'id_objetos' => $id_obj]
        );
        $response = new \stdClass(); //Para evitar error: Creating default object from empty value
        $response->result = 'Ok';
        echo json_encode($response);
    }
}