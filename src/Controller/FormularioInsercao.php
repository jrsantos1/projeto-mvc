<?php


namespace Alura\Cursos\Controller;


class FormularioInsercao extends ControllerComHtml
{

    public function processaRequisicao()
    {   
        //require __DIR__ . '/../../view/cursos/formulario.php';
        $titulo = 'Novo Curso';
        echo $this->renderizaHtml('cursos/formulario.php', [
            'titulo' => $titulo,
        ]);
        
    }

}