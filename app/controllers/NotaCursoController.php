<?php

class NotaCursoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Nota do Curso";

        $this->carregarViews('nota_curso',$dados);
    }

}