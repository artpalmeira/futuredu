<?php

class AtualizarPerfilController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Atualizar Perfil";

        $this->carregarViews('atualizar_perfil',$dados);
    }

}