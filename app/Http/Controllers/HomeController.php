<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $usuario = "Maria Nunes";
        $perfil = "Gerente";
        $empresa = "Google";

        $dados = [
            'usuario' => $usuario,
            'perfil' => $perfil,
            'empresa' => $empresa
        ];

        return view('home', $dados);
    }

}
