<?php

class PerfilController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Pefil";

        $this->carregarViews('perfil',$dados);
    }

}