<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
</head>
<body>
    <form action="/usuario/<?= $padrao['acao'] ?>" method="post">
        <label for="input_nome">
            Nome:
            <input type="text" name="nome" id="input_nome" value="<?= $padrao['nomeEditar'] ?>">
        </label>
        <label for="input_email">
            Email:
            <input type="text" name="email" id="input_email" value="<?= $padrao['emailEditar'] ?>">
        </label>
        <label for="input_telefone">
            Telefone:
            <input type="text" name="telefone" id="input_telefone" value="<?= $padrao['telefoneEditar'] ?>">
        </label>
        <label for="input_senha">
            Senha:
            <input type="password" name="senha" id="input_senha" value="<?= $padrao['senhaEditar'] ?>">
        </label>
        <button type="submit"><?= $padrao['acao']=="enviar" ? "Enviar" : "Editar" ?></button>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>Email</th><th>Senha</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dados as $dado):?>
            <tr>
                <td><?=$dado->getId()?></td>
                <td><?=$dado->getNome()?></td>
                <td><?=$dado->getEmail()?></td>
                <td><?=$dado->getSenha()?></td>
                <td><a href="/usuario/editar/<?=$dado->getId()?>">Editar</a> | <a href="/usuario/excluir/<?=$dado->getId()?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>