<?php

use Alura\Cursos\Controller\AlteraCursos;
use Alura\Cursos\Controller\Deslogar;
use Alura\Cursos\Controller\Exclusao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\FormularioLogin;
use Alura\Cursos\Controller\ListaCursos;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\RealizaLogin;

return [
     '/listar-cursos' => ListaCursos::class,
     '/novo-curso' => FormularioInsercao::class,
     '/salvar-curso' => Persistencia::class,
     '/excluir-curso' => Exclusao::class,
     '/alterar-cursos' => AlteraCursos::class,
     '/login-usuario' => FormularioLogin::class,
     '/realiza-login' => RealizaLogin::class,
     '/logout' => Deslogar::class

 ];

