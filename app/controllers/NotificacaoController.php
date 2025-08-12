<?php

class NotificacaoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Notificação";

        $this->carregarViews('notificacao',$dados);
    }

}