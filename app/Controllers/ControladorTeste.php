<?php

namespace App\Controllers;

use App\Controllers\ControladorGeral;

class ControladorTeste extends ControladorGeral{
    public function index(){
        $this->render("../testes/testes");
    }

    public function usuario(){
        require __DIR__ . "/../testes/usuario.php";
    }

    public function funcionario(){
        require __DIR__ . "/../testes/funcionario.php";
    }

    public function servico(){
        require __DIR__ . "/../testes/servico.php";
    }

    public function especialidade(){
        require __DIR__ . "/../testes/especialidade.php";
    }

    public function agendamento(){
        require __DIR__ . "/../testes/agendamento.php";
    }

    public function agendamentoServico(){
        require __DIR__ . "/../testes/agendamentoServico.php";
    }

}