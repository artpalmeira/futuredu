<?php

class CursoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Curso";

        $this->carregarViews('curso',$dados);
    }

}