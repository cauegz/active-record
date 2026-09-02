<?php

namespace App\Controllers;

use App\Controllers\ControladorGeral;
use App\Models\Funcionario;

class ControladorFuncionario extends ControladorGeral{
    public function index(){
        $funcionarios = Funcionario::all();
        
    }
}