<?php

use App\Core\Conexao;
use App\Models\Funcionario;

$sql = "DELETE FROM funcionario WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE funcionario_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $funcionario = new Funcionario();
    $id = $funcionario->setNome("teste")
                ->setIdEspecialidade(1)
                ->setCpf("11111111111")
                ->setSalario(2000)
                ->save();
    $funcionario->setId($id);
    var_dump($funcionario);
    echo "<br>Testando READ<br>";
    if (!(Funcionario::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $funcionario = Funcionario::find($id);
    $id = $funcionario->setNome("nome")
                ->setIdEspecialidade(2)
                ->setCpf("11111111111")
                ->setSalario(3000)
                ->save();
    var_dump($funcionario);
    echo "<br>Testando DELETE<br>";
    $funcionario = Funcionario::find($id);
    $funcionario->delete();
    if (Funcionario::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
