<?php

class AlunoController extends Controller
{

    private $modelAluno;

    public function __construct()
    {
        $this->modelAluno = new Aluno();
    }



    // ####################################
    // ########### DASHBOARD ##############
    // ####################################


    // Método para listar os cursos
    public function listar()
    {
        $dados = array();
        $dados['conteudo'] = 'admin/aluno/listar';
        $alunos = $this->modelAluno->getTodosAlunos();
        $dados['alunos'] = $alunos;
        $this->carregarViews('admin/dash', $dados);
    }
}
