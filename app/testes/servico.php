<?php

use App\Core\Conexao;
use App\Models\Servico;

$sql = "DELETE FROM servico WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE servico_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $servico = new Servico();
    $id = $servico->setNome("corte de cabelo")
                ->setPreco(35.00)
                ->setDuracaoMin(40)
                ->save();
    $servico->setId($id);
    var_dump($servico);
    echo "<br>Testando READ<br>";
    if (!(Servico::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $servico = Servico::find($id);
    $id = $servico->setNome("manicure")
                ->setPreco(80.00)
                ->setDuracaoMin(60)
                ->save();
    var_dump($servico);
    echo "<br>Testando DELETE<br>";
    $servico = Servico::find($id);
    $servico->delete();
    if (Servico::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
