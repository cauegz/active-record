<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute(string $url,string $acao): void {
        $this->routes[$url] = [
            'acao' => $acao,
        ];
    }

    public function execute(string $url): void
    {
        $rotas = $this->routes ?? [];
        foreach ($rotas as $rota => $configuracao) {
            $parametros = [];

            //procura parâmetros da rota e substitui cada um por um grupo de captura da regex.
            $regex = preg_replace_callback(
                '/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/',
                function (array $matches) use (&$parametros): string {
                    $parametros[] = $matches[1];
                    return '([^/]+)';
                },
                $rota
            );

            //adiciona que é inicio da string e final com barra opcional
            $regex = '#^' . $regex . '/?$#';

            //se o regex nao bater com a url retorna
            if (!preg_match($regex, $url, $valores)) {
                continue;
            }

            //remove a url e deixa só os parâmetros no array valores
            array_shift($valores);

            $this->executarControlador($configuracao['acao'], $valores);

            return;
        }

        exit("rota não encontrada");
    }

    private function executarControlador(string $acao, array $parametros): void
    {
        [$nomeControlador, $funcao] = explode("@", $acao, 2);

        $controlador = "App\\Controllers\\Controlador"
            . $nomeControlador;

        if (!class_exists($controlador)) {
            exit("classe não encontrada");
        }

        $instance = new $controlador();

        if (!is_callable([$instance, $funcao])) {
            exit("metodo não encontrada");
        }

        $resultado = $instance->$funcao(...$parametros);

        if ($resultado !== null) {
            echo $resultado;
        }
    }
}