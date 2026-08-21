<?php
namespace App\Controllers;

use App\Controllers\ControladorGeral;

class ControladorHome extends ControladorGeral{
    public function index(){
        $this->render("home");
    }
}