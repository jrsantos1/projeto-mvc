<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
//use Doctrine\ORM\Query\AST\Functions\FunctionNode;

class AlteraCursos implements InterfaceControladorRequisicao
{   
    private $entity;

    public function __construct()
    {
        $this->entity = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {   
        $titulo = 'Alterar Curso';
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $curso = ($this->entity->getRepository(Curso::class))->find($id);
        

        require __DIR__ .'/../../view/cursos/formulario.php';

    }
}