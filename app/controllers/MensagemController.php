<?php

class MensagemController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Mensagem";

        $this->carregarViews('mensagem',$dados);
    }

}