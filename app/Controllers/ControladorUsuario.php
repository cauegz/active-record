<?php
namespace App\Controllers;

use App\Controllers\ControladorGeral;
use App\Models\Usuario;
use Exception;

class ControladorUsuario extends ControladorGeral{
    public function index(){
        $dados = Usuario::all();

        $padrao['nomeEditar'] = "";
        $padrao['emailEditar'] = "";
        $padrao['telefoneEditar'] = "";
        $padrao['senhaEditar'] = "";

        $padrao['acao'] = "enviar";
        $this->render("formUser", ["dados" => $dados, "padrao" => $padrao]);
    }

    public function enviar(){
        extract($_POST);
        try{
            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            $usuario->setSenha($senha);
            $usuario->save();
        } catch(Exception $e){
            echo "Ocorreu um erro ao salvar. Mensagem:" . $e->getMessage();
        }
        header("Location: /usuario");
    }

    public function excluir($id){
        $usuario = Usuario::find($id);
        $usuario->delete();
        header("Location: /usuario");
    }

    public function editar($id){
        $dados = Usuario::all();

        $usuario = Usuario::find($id);
        $padrao['nomeEditar'] = $usuario->getNome();
        $padrao['emailEditar'] = $usuario->getEmail();
        $padrao['telefoneEditar'] = $usuario->getTelefone();
        $padrao['senhaEditar'] = $usuario->getSenha();

        $padrao['acao'] = "processa/$id";
        $this->render("formUser", ["dados" => $dados, "padrao" => $padrao]);
    }

    public function processa($id){
        extract($_POST);
        try{
            $usuario = Usuario::find($id);
            $usuario->setNome($nome)->setEmail($email)->setTelefone($telefone)->setSenha($senha)->save();
        } catch(Exception $e){
            die("Ocorreu um erro ao salvar. Mensagem: " . $e->getMessage());
        }

        header("Location: /usuario");
    }
}