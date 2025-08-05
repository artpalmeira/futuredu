<?php

class EsqueciSenhaController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Esqueci Senha";

        $this->carregarViews('esqueci_senha',$dados);
    }

}