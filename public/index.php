<?php

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

//testes
$router->addRoute("/teste", "Teste@index");
$router->addRoute("/teste/usuario", "Teste@usuario");
$router->addRoute("/teste/funcionario", "Teste@funcionario");
$router->addRoute("/teste/servico", "Teste@servico");
$router->addRoute("/teste/especialidade", "Teste@especialidade");
$router->addRoute("/teste/agendamento", "Teste@agendamento");
$router->addRoute("/teste/agendamentoServico", "Teste@agendamentoServico");


//rotas fixas sempre antes de dinamicas
$router->addRoute("/", "Home@index");
$router->addRoute("/usuario", "Usuario@index");
$router->addRoute("/usuario/enviar", "Usuario@enviar");
$router->addRoute("/usuario/processa/{id}", "Usuario@processa");
$router->addRoute("/usuario/excluir/{id}", "Usuario@excluir");
$router->addRoute("/usuario/editar/{id}", "Usuario@editar");


$router->execute(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));