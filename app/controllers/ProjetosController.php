<?php

class ProjetosController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Projetos";

        $this->carregarViews('projetos',$dados);
    }

}