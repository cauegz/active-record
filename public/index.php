<?php
use App\Models\Produto;

require_once __DIR__ . '/../vendor/autoload.php';

$produto = new Produto();
$produto->setNome("nome");
$produto->setDescricao("descricao");
$produto->setPreco(10.50);

if($produto->save()) echo "deu";
else echo "nao deu";