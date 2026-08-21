<?php
namespace App\Controllers;

abstract class ControladorGeral{
    public function render($view, $dados = []){
        extract($dados);
        require __DIR__ . "/../Views/{$view}.php";
    }   
}