<?php 

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManager;

class Persistencia implements InterfaceControladorRequisicao
{   
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {   
        $descricao = filter_input
        (INPUT_POST, 
        'descricao', 
        FILTER_SANITIZE_STRING
            );
        //$descricao = $_POST['descricao'];
        $curso = new Curso();
        $curso->setDescricao($descricao);
        

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!is_null($id) && !$id === false) {
            $novoCurso = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
            $alteraCurso = $this->entityManager->find(Curso::class, $id);
            $alteraCurso->setDescricao($novoCurso);
        }else{
            $this->entityManager->Persist($curso);
        }
        $this->entityManager->flush();

        header('location: /listar-cursos');
    }


}
