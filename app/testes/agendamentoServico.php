<?php

use App\Core\Conexao;
use App\Models\AgendamentoServico;

$sql = "DELETE FROM agendamento_servico WHERE id > 5";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

$sql = "ALTER SEQUENCE agendamento_servico_id_seq RESTART WITH 6";
$stmt = Conexao::getConnection()->prepare($sql);
$stmt->execute();

try {
    echo "Testando CREATE<br>";
    $agendamentoServico = new AgendamentoServico();
    $id = $agendamentoServico->setIdServico(1)
                    ->setIdAgendamento(1)
                    ->save();
    $agendamentoServico->setId($id);
    var_dump($agendamentoServico);
    echo "<br>Testando READ<br>";
    if (!(AgendamentoServico::all())) echo "tem nada no banco";
    echo "Testando UPDATE<br>";
    $agendamentoServico = AgendamentoServico::find($id);
    $id = $agendamentoServico->setIdServico(2)
                    ->setIdAgendamento(2)
                    ->save();
    var_dump($agendamentoServico);
    echo "<br>Testando DELETE<br>";
    $agendamentoServico = AgendamentoServico::find($id);
    $agendamentoServico->delete();
    if (AgendamentoServico::find($id)) echo "delete não funcionou";
    else echo "delete funcionou";
} catch (Exception $e) {
    die("Não funcionou, erro que deu: " . $e->getMessage());
}
