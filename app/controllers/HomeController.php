<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['titulo'] = 'Site escola';
        $dados['palavras'] = 'Escola, educação...';

        // Carregar todos 6 cursos - Rand 
        $modelCurso = new Curso();
        $dados['cursos'] = $modelCurso->getCursoRand(4);


        $this->carregarViews('home', $dados);
    }
}
