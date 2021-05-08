<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Exclusao implements InterfaceControladorRequisicao
{       

    /**
     * @var EntityManagerInterface $entity
     */
    private $entity;

    public function __construct()
    {
        $this->entity = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === false || is_null($id)) {
            
            header('location: /listar-cursos');
            return;
        }

        $curso = $this->entity->getReference(Curso::class, $id);
        $this->entity->remove($curso);
        $this->entity->flush();
        header('location: /listar-cursos');
        

    }

}