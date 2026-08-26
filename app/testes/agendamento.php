<?php

use App\Core\Conexao;
use App\Models\Agendamento;

$sql = "DELETE FROM agendamento WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE agendamento_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $agendamento = new Agendamento();
    $id = $agendamento->setIdFuncionario(1)
                ->setIdUsuario(1)
                ->setInfantil("false")
                ->setHorario("2026-08-25 14:00:00")
                ->save();
    //$agendamento->setId($id);
    var_dump($agendamento);
    echo "<br>Testando READ<br>";
    if (!(Agendamento::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $agendamento = Agendamento::find($id);
    $id = $agendamento->setIdFuncionario(2)
                ->setIdUsuario(2)
                ->setInfantil("true")
                ->setHorario("2026-08-29 16:00:00")
                ->save();
    var_dump($agendamento);
    echo "<br>Testando DELETE<br>";
    $agendamento = Agendamento::find($id);
    $agendamento->delete();
    if (Agendamento::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
