<?php

namespace Alura\Cursos\Controller;

//require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;



class ListaCursos extends ControllerComHtml
{   
    private $repositorio;
    private $cursos;


    public function __construct(){
        $entityManagerFactory = new EntityManagerCreator();
        $entityManager = $entityManagerFactory->getEntityManager();
        $this->repositorio = $entityManager->getRepository(Curso::class);
    }
    /**
     * @var Curso $curso
     */
    public function processaRequisicao()    {
        
        //require __DIR__ . '/../../view/cursos/listar-cursos.php';
        $cursos = $this->repositorio->findAll();
        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $cursos
            
        ]);

    }

    
    


}