<?php
namespace App\Controllers;

use App\Controllers\ControladorGeral;
use App\Models\Usuario;

class ControladorUsuario extends ControladorGeral{
    public function formulario(){
        $dados = Usuario::all();
        $this->render("formUser", ["dados" => $dados]);
    }
}