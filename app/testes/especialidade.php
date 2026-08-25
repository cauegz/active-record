<?php

use App\Core\Conexao;
use App\Models\Especialidade;

$sql = "DELETE FROM especialidade WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE especialidade_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $especialidade = new Especialidade();
    $id = $especialidade->setNome("corte de cabelo")->save();
    $especialidade->setId($id);
    var_dump($especialidade);
    echo "<br>Testando READ<br>";
    if (!(Especialidade::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $especialidade = Especialidade::find($id);
    $id = $especialidade->setNome("manicure")->save();
    var_dump($especialidade);
    echo "<br>Testando DELETE<br>";
    $especialidade = Especialidade::find($id);
    $especialidade->delete();
    if (Especialidade::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
