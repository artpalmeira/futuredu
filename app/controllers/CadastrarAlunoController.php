<?php

class CadastrarAlunoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = "Cadastrar Aluno";

        $this->carregarViews('cadastrar_aluno',$dados);
    }

}