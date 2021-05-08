<?php 

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizaLogin implements InterfaceControladorRequisicao
{   
    /**
     * @var EntityManagerInterface $entity
     */

    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    public function processaRequisicao(): void
    {   


        $repositorioUsuarios = $this->entityManager->getRepository(Usuario::class);

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
     
        if (is_null($email) || $email === false) {

            $_SESSION['mensagem'] = 'E-mail inválido';
            $_SESSION['tipo_mensagem'] = 'Danger';
            header('location: /usuario-login');
        }

        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
        /**
         * @var USUARIO $usuario
         */
        $usuario = $repositorioUsuarios->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = "E-mail ou senha inválidos";
            header('Location: /login-usuario');
            return;
        }

        $_SESSION['logado'] = true;

        header('location: /listar-cursos');
    }
}
        

    
