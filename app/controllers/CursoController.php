<?php

class CursoController extends Controller
{

    private $modelCurso;

    public function __construct()
    {
        $this->modelCurso = new Curso();
    }


    public function index()
    {

        $dados = array();

        $todosOsCurso = $this->modelCurso->getTodosCurso();
        $dados['cursos'] = $todosOsCurso;

        $this->carregarViews('cursos', $dados);
    }


    public function detalhe($link)
    {
        $dados = array();
        $curso = $this->modelCurso->getTodosCurso();

        foreach ($curso as $linha) {

            if ($this->gerarLinkCurso($linha['nome_curso']) == $link) {

                $dados['curso'] = $linha;
                $dados['titulo'] = $linha['nome_curso'];
                $this->carregarViews('detalhe', $dados);
                return;
            }
        }
    }


    function gerarLinkCurso($link)
    {

        $link = mb_strtolower($link, 'UTF-8');
        $caracter = [
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ü' => 'u',
            'ñ' => 'n',
            'ç' => 'c',
            ' ' => '-'
        ];

        $link = strtr($link, $caracter);

        return $link;
    }


    // ####################################
    // ########### DASHBOARD ##############
    // ####################################


    // Método para listar os cursos
    public function listar()
    {
        $dados = array();
        $dados['conteudo'] = 'admin/curso/listar';
        $cursos = $this->modelCurso->getTodos();
        $dados['cursos'] = $cursos;
        $this->carregarViews('admin/dash', $dados);
    }

    // Método para adicionar o curso
    public function adicionar()
    {

        $dados = array();

        /** 1º A chamada vem do botão Cadastrar Curso */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** 2º Pegar os dados do form */
            $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $nivel_curso = filter_input(INPUT_POST, 'nivel_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $carga_horaria_curso = filter_input(INPUT_POST, 'carga_horaria_curso', FILTER_SANITIZE_NUMBER_INT);
            $descricao_curso = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $modalidade_curso = filter_input(INPUT_POST, 'modalidade_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $area_curso = filter_input(INPUT_POST, 'area_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $pre_requisito_curso = filter_input(INPUT_POST, 'pre_requisito_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor_curso = filter_input(INPUT_POST, 'valor_curso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $alt_curso = $nome_curso;

            date_default_timezone_set('America/Sao_Paulo');
            $data_criacao_curso = date('y-m-d H:i:s');
            $data_atualizacao_curso = date('y-m-d H:i:s');
            $status_curso = 'Pendente';


            /** 3º Inserir os dados na tabela curso */
            if ($nome_curso && $nivel_curso && $carga_horaria_curso) {

                $dadosCurso = array(
                    'nome_curso'                => $nome_curso,
                    'nivel_curso'               => $nivel_curso,
                    'carga_horaria_curso'       => $carga_horaria_curso,
                    'descricao_curso'           => $descricao_curso,
                    'modalidade_curso'          => $modalidade_curso,
                    'area_curso'                => $area_curso,
                    'pre_requisito_curso'       => $pre_requisito_curso,
                    'valor_curso'               => $valor_curso,
                    'alt_curso'                 => $nome_curso,
                    'data_criacao_curso'        => $data_criacao_curso,
                    'data_atualizacao_curso'    => $data_atualizacao_curso,
                    'status_curso'              => $status_curso
                );

                $id_curso = $this->modelCurso->addCurso($dadosCurso);


                /** 4º Tratar o nome da imagem e salvar na pasta UPLOAD */
                if ($id_curso) {

                    /** 5º Atualizar a campo foto_curso com o novo nome da foto */
                    if (isset($_FILES['foto_curso']) && $_FILES['foto_curso']['error'] == 0) {

                        $arquivo = $this->uploadFoto($_FILES['foto_curso'], $id_curso, $nome_curso);

                        if ($arquivo) {
                            // Atualizar a foto na base de dados do Curso add, no ultimo ID Curso add
                            $this->modelCurso->atualizarFoto($id_curso, $arquivo);
                        } else {
                            // Mag informando que a fot não foi salva
                            $dados['mensagem'] = "Erro ao salvar a foto!";
                            $dados['tipoMsg'] = "erro";
                        }
                    }

                    /** 6º Alerta na página de Listar Curso */
                    $_SESSION['mensagem'] = "Curso adicionado com sucesso!";
                    $_SESSION['tipoMsg'] = "sucesso";
                    header('Location:' . URL_BASE . 'curso/listar');
                    exit;
                }
            }
        }







        $dados['conteudo'] = 'admin/curso/adicionar';
        $this->carregarViews('admin/dash', $dados);
    } // Fim do método Adicionar


    public function editar($id)
    {


        $dados = array();

        /** 1º Carregar as informações atuais do curso */
        $carregarDadosCurso = $this->modelCurso->caregarDados($id);
        $dados['carregarDadosCurso'] = $carregarDadosCurso;

        /** 2º A chamada vem do botão Editar Curso */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** 2º Pegar os dados do form */
            $nome_curso = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $nivel_curso = filter_input(INPUT_POST, 'nivel_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $carga_horaria_curso = filter_input(INPUT_POST, 'carga_horaria_curso', FILTER_SANITIZE_NUMBER_INT);
            $descricao_curso = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $modalidade_curso = filter_input(INPUT_POST, 'modalidade_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $area_curso = filter_input(INPUT_POST, 'area_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $pre_requisito_curso = filter_input(INPUT_POST, 'pre_requisito_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $valor_curso = filter_input(INPUT_POST, 'valor_curso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $alt_curso = $nome_curso;

            date_default_timezone_set('America/Sao_Paulo');
            $data_criacao_curso = $carregarDadosCurso['data_criacao_curso'];
            $data_atualizacao_curso = date('y-m-d H:i:s');
            $status_curso = $carregarDadosCurso['status_curso'];


            /** 3º Atualizar os dados na tabela curso */
            if ($nome_curso && $nivel_curso && $carga_horaria_curso) {

                /** 4º Atualizar a campo foto_curso com o novo nome da foto */
                if (isset($_FILES['foto_curso']) && $_FILES['foto_curso']['error'] == 0) {

                    $arquivo = $this->uploadFoto($_FILES['foto_curso'], $id, $nome_curso);

                } else {

                    $arquivo = $carregarDadosCurso['foto_curso'];
                }


                $dadosCurso = array(
                    'id_curso'                  => $id,
                    'nome_curso'                => $nome_curso,
                    'nivel_curso'               => $nivel_curso,
                    'carga_horaria_curso'       => $carga_horaria_curso,
                    'descricao_curso'           => $descricao_curso,
                    'modalidade_curso'          => $modalidade_curso,
                    'area_curso'                => $area_curso,
                    'pre_requisito_curso'       => $pre_requisito_curso,
                    'valor_curso'               => $valor_curso,
                    'alt_curso'                 => $nome_curso,
                    'data_criacao_curso'        => $data_criacao_curso,
                    'data_atualizacao_curso'    => $data_atualizacao_curso,
                    'status_curso'              => $status_curso,
                    'foto_curso'                => $arquivo
                );

                $resultado = $this->modelCurso->editarCurso($dadosCurso);


                /** 4º Tratar o nome da imagem e salvar na pasta UPLOAD */
                if ($resultado) {

                    /** 5º Alerta na página de Listar Curso */
                    $_SESSION['mensagem'] = "Curso atualizado com sucesso!";
                    $_SESSION['tipoMsg'] = "sucesso";
                    header('Location:' . URL_BASE . 'curso/listar');
                    exit;
                }else{
                    $_SESSION['mensagem'] = "Erro! Curso não atualizado.";
                    $_SESSION['tipoMsg'] = "erro";
                    header('Location:' . URL_BASE . 'curso/listar');
                    exit;
                }
            }
        }



        /** 3º Pegar os dados do form */
        /** 4º Atualizar os dados na tabela curso */
        /** 5º Tratar o nome da imagem e salvar na pasta UPLOAD */
        /** 6º Atualizar a campo foto_curso com o novo nome da foto */
        /** 7º Alerta na página de Listar Curso */

        $dados['conteudo'] = 'admin/curso/editar';
        $this->carregarViews('admin/dash', $dados);
    } // Fim do método Editar

    // Método para Desativar o Curso
    public function desativar($id){

        $resultado = $this->modelCurso->desativarCurso($id);

        if($resultado){
            // Retornar a resposta do AJAX
            echo json_encode(['sucesso' => true]);
        }else{
            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar']);
        }

    }

    // Método para atualizar o status do curso
    public function atualizarStatus(){

        $dados = json_decode(file_get_contents('php://input'), true);

        $sucesso = $this->modelCurso->atualizarStatus($dados['id_curso'], $dados['status_curso']);

        echo json_encode(['sucesso' => $sucesso]);

    }


    // Método para realizar o upload da foto com o tratamento do nome
    public function uploadFoto($file, $id, $nome)
    {

        $dir = 'upload/curso/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        $novoNome = $id . '_' . $this->gerarLinkCurso($nome) . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $dir . $novoNome)) {
            // $file['tmp_name'] - C:\xampp\tmp\phpE0E7.tmp
            // $dir . $novoNome - upload/curso/19_informatica.jpg

            return $novoNome;
        } else {
            $novoNome = 'sem-foto.jpg';
            return $novoNome;
        }
    }
}
