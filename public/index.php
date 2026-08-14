<?php

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();

//rotas fixas sempre antes de dinamicas
$router->addRoute("/usuario", "Usuario@index");
$router->addRoute("/usuario/enviar", "Usuario@enviar");
$router->addRoute("/usuario/excluir/{id}", "Usuario@excluir");
$router->addRoute("/usuario/editar/{id}", "Usuario@editar");


$router->execute(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));