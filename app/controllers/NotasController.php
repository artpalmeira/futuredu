<?php

class NotasController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Notas";

        $this->carregarViews('notas',$dados);
    }

}