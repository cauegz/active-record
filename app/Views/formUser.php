<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuário</title>
</head>
<body>
    <?php foreach($dados as $linha): ?>
        <h1><?= $linha->getNome() ?></h1>
        <h2><?= $linha->getEmail() ?></h2>
        <p><?= $linha->getTelefone() ?></p>
    <?php endforeach; ?>
</body>
</html>