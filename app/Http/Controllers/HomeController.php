<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //Todos los usuarios
        $todosLosUsuarios = User::where('id','<>',$usuario_id)->get();

        return view('dashboard')->with([
            'todosLosUsuarios' => $todosLosUsuarios,
        ]);        
    }
}
