<?php

require __DIR__.'/../vendor/autoload.php';
/*
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListaCursos;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\Exclusao;
*/
$caminho = $_SERVER['PATH_INFO'];
$route = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $route)) {
    http_response_code(404);
    exit;
}

session_start();

$elogin = stripos($caminho, 'login');

if (!isset($_SESSION['logado']) && $elogin === false) {
    
    header('location: /login-usuario');
}

$classeControladora = $route[$caminho];
/**
 * @var InterfaceControladorRequisicao $instancia 
 */
$instancia = new $classeControladora();
$instancia->processaRequisicao();
