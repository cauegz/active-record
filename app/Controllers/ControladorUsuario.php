<?php
namespace App\Controllers;

use App\Controllers\ControladorGeral;

class ControladorUsuario extends ControladorGeral{
    public function formulario(){
        $this->render("formUser", ["nome" => "issoéumnome"]);
    }
}