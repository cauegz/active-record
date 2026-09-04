<?php

namespace App\Controllers;

use App\Controllers\ControladorGeral;
use App\Models\Especialidade;
use App\Models\Funcionario;
use Exception;

class ControladorFuncionario extends ControladorGeral{
    public function index(){
        $dados = Funcionario::all();

        $padrao['nomeEditar'] = "";
        $padrao['cpfEditar'] = "";
        $padrao['salarioEditar'] = "";
        $padrao['idEspecialidade'] = "";

        $padrao['acao'] = "enviar";
        $this->render("formFuncionario", ["dados" => $dados, "padrao" => $padrao, "especialidades" => Especialidade::all()]);   
    }

    public function enviar(){
        extract($_POST);
        try{
            $funcionario = new Funcionario();
            $funcionario->setNome($nome);
            $funcionario->setCpf($cpf);
            $funcionario->setSalario($salario);
            $funcionario->setIdEspecialidade($idEspecialidade);
            $funcionario->save();
        } catch(Exception $e){
            echo "Ocorreu um erro ao salvar. Mensagem:" . $e->getMessage();
        }
        header("Location: /funcionario");
    }

    public function excluir($id){
        $funcionario = Funcionario::find($id);
        $funcionario->delete();
        header("Location: /funcionario");
    }

    public function editar($id){
        $dados = Funcionario::all();

        $funcionario = Funcionario::find($id);
        $padrao['nomeEditar'] = $funcionario->getNome();
        $padrao['cpfEditar'] = $funcionario->getCpf();
        $padrao['salarioEditar'] = $funcionario->getSalario();
        $padrao['idEspecialidadeEditar'] = $funcionario->getIdEspecialidade();

        $padrao['acao'] = "processa/$id";
        $this->render("formFuncionario", ["dados" => $dados, "padrao" => $padrao, "especialidades" => Especialidade::all()]);
    }

    public function processa($id){
        extract($_POST);
        try{
            $funcionario = Funcionario::find($id);
            $funcionario->setNome($nome)->setCpf($cpf)->setSalario($salario)->setIdEspecialidade($idEspecialidade)->save();
        } catch(Exception $e){
            die("Ocorreu um erro ao salvar. Mensagem: " . $e->getMessage());
        }

        header("Location: /funcionario");
    }
}