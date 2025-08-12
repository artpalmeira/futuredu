<?php

class MenuController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Menu";

        $this->carregarViews('menu',$dados);
    }

}