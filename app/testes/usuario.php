<?php

use App\Core\Conexao;
use App\Models\Usuario;

$sql = "DELETE FROM usuario WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE usuario_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $usuario = new Usuario();
    $id = $usuario->setNome("teste")->setEmail("teste@email.com")->setTelefone("519980528602")->setSenha("issoéumasenha")->save();
    $usuario->setId($id);
    var_dump($usuario);
    echo "<br>Testando READ<br>";
    if (!(Usuario::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $usuario = Usuario::find($id);
    $id = $usuario->setNome("outroNome")->setEmail("outro@email.com")->setTelefone("12345678910")->setSenha("issonaoeumasenha")->save();
    var_dump($usuario);
    echo "<br>Testando DELETE<br>";
    $usuario = Usuario::find($id);
    $usuario->delete();
    if (Usuario::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
