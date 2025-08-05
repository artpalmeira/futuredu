<?php

class ConfiguracaoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Configuração";

        $this->carregarViews('configuracao',$dados);
    }

}