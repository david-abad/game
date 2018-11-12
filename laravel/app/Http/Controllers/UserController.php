<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller {
   public function index($id){
      $user = DB::table('usuarios')->where("id", $id)->first();
      return view('index', ["users"=>$user]);
   }
}
