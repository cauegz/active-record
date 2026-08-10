<?php
use App\Models\Usuario;

require_once __DIR__ . '/../vendor/autoload.php';

$usuario = new Usuario();

var_dump(Usuario::all());