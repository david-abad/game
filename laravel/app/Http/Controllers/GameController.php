<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function startGame($level, $user_id){
        $levelToLoad = "/levels/lvl".$level;
        return view($levelToLoad, ['user'=>$user_id]);
    }
}
