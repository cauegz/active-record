<?php
use App\Models\Funcionario;
use App\Models\Especialidade;
/**
 * @var array<string> $padrao
 * @var array<Funcionario> $dados
 * @var array<Especialidade> $especialidades
 */
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar funcionário</title>
</head>
<body>
    <form action="/funcionario/<?= $padrao['acao'] ?>" method="post">
        <label for="input_nome">
            Nome:
            <input type="text" name="nome" id="input_nome" value="<?= $padrao['nomeEditar'] ?>">
        </label>
        <label for="input_cpf">
            CPF:
            <input type="text" name="cpf" id="input_cpf" value="<?= $padrao['cpfEditar'] ?>">
        </label>
        <label for="input_salario">
            Salario:
            <input type="number" step="0.1" min="0" name="salario" id="input_salario" value="<?= $padrao['salarioEditar'] ?>">
        </label>
        <label for="input_especialidade">
            Especialidade:
            <select name="idEspecialidade" id="input_especialidade">
                <?php foreach($especialidades as $especialidade): ?>
                    <option value="<?= $especialidade->getId()?>" <?= $padrao['idEspecialidadeEditar'] == $especialidade->getId() ? "selected" : "" ?>><?= $especialidade->getNome() ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <button type="submit"><?= $padrao['acao']=="enviar" ? "Enviar" : "Editar" ?></button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>Cpf</th><th>Salario</th><th>Especialidade</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dados as $dado):?>
            <tr>
                <td><?=$dado->getId()?></td>
                <td><?=$dado->getNome()?></td>
                <td><?=$dado->getCpf()?></td>
                <td><?=$dado->getSalario()?></td>
                <td><?=Especialidade::find($dado->getIdEspecialidade())->getNome()?></td>
                <td><a href="/funcionario/editar/<?=$dado->getId()?>">Editar</a> | <a href="/funcionario/excluir/<?=$dado->getId()?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>