<?php

class FuncionarioController extends Controller
{

    private $modelFuncionario;

    public function __construct()
    {
        $this->modelFuncionario = new Funcionario();
    }







    // ####################################
    // ########### DASHBOARD ##############
    // ####################################


    // Método para listar os Funcionario
    public function listar()
    {
        $dados = array();
        $dados['conteudo'] = 'admin/funcionario/listar';
        $funcionarios = $this->modelFuncionario->getTodosFuncionarios();
        $dados['funcionarios'] = $funcionarios;
        $this->carregarViews('admin/dash', $dados);
    }


    public function professor()
    {
        $dados = array();
        $dados['conteudo'] = 'admin/funcionario/professor';
        $professor = $this->modelFuncionario->getTodosProfessores();
        $dados['professor'] = $professor;
        $this->carregarViews('admin/dash', $dados);
    }
}
