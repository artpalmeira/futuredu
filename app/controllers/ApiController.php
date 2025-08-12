<?php

class ApiController extends Controller
{

    private $cursoModel;
    private $empresaModel;
    private $funcionarioModel;
    private $projetoModel;
    private $alunoModel;

    public function __construct()
    {
        $this->cursoModel = new Curso();
        $this->empresaModel = new Empresa();
        $this->funcionarioModel = new Funcionario();
        $this->projetoModel = new Projeto();
        $this->alunoModel = new Aluno();
    }

    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Área de Atuação - Ki Oficina';

        //var_dump("Teste");
        $this->carregarViews('api', $dados);

       
    }

    //************LOGIN**************** */
    public function LoginAluno()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email_aluno'] ?? null;
            $senha = $_POST['senha_aluno'] ?? null;

            if (!$email || !$senha) {
                http_response_code(400);
                echo json_encode(["erro" => "Email e senha são obrigatórios!"]);
                return;
            }

            $aluno = $this->alunoModel->postLoginAluno($email, $senha);

            if ($aluno) {
                http_response_code(200);
                echo json_encode([
                    "mensagem" => "Login realizado com sucesso!",               
                    "Aluno" => $aluno
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(401);
                echo json_encode(["erro" => "Email ou senha invalidos ou aluno inativo"]);
            }
        } else {
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido"]);
        }
    }

    // ************CURSOS*****************
    // Listar todos os cursos em ordem alfabética
    public function ListarCursos()
    {
        //echo 'ListarCursos';
        $cursos = $this->cursoModel->getTodosCurso();

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }
        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Listar os cursos aleatórios
    public function ListarCursosAleatorio()
    {
        // echo 'ListarCursosAleatorio';
        $cursos = $this->cursoModel->getCursoRand();

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }
        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Listar todos os funcionarios de acordo o cargo em ordem alfabética
    public function ListarCursoBusca($curso)
    {
        //echo 'ListarCursoBusca';
        $cursos = $this->cursoModel->getCursoBusca($curso);

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }
        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    // ************EMPRESAS*****************
    // Listar todos os empresa em ordem alfabética
    public function ListarEmpresas()
    {
        //echo 'ListarEmpresas';
        $empresas = $this->empresaModel->getEmpresas();

        if (empty($empresas)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhuma empresa encontrada"]);
            return;
        }
        echo json_encode($empresas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    
    // ************FUNCIONARIOS*****************
    // Listar todos os funcionarios pelo cargo em ordem alfabética
    public function ListarFuncionariosDados()
    {
        //echo 'ListarFuncionariosDados';
        $funcionarios = $this->funcionarioModel->getDadosFuncionario();

        if (empty($funcionarios)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum funcionário encontrada"]);
            return;
        }
        echo json_encode($funcionarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // Listar todos os funcionarios de acordo o cargo em ordem alfabética
    public function ListarFuncionariosCargo($cargo)
    {
        //echo 'ListarFuncionariosCargo';
        $funcionarios = $this->funcionarioModel->getFuncionariosCargo($cargo);

        if (empty($funcionarios)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum funcionário encontrado"]);
            return;
        }
        echo json_encode($funcionarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ************PROJETOS*****************
    public function NovoProjeto()
    {
        $titulo = $_POST['titulo_projeto'] ?? null;
        $descricao = $_POST['descricao_projeto'] ?? null;
        $cod_professor = $_POST['id_professor'] ?? null;
        $cod_sigla = $_POST['id_sigla'] ?? null;
        $data_inicio = $_POST['data_inicio_projeto'] ?? null;
        $data_entrega = $_POST['data_entrega_projeto'] ?? null;
        $status_projeto = $_POST['status_projeto'] ?? null;
        $url_projeto = $_POST['url_projeto'] ?? null;

        $resposta = $this->projetoModel->postNovoProjeto($titulo, $descricao, $cod_professor, $cod_sigla, $data_inicio, $data_entrega, $status_projeto, $url_projeto);

        header('Content-Type: application/json');
        echo json_encode($resposta);
        exit;
    }

    public function ParticiparProjeto()
    {

        $cod_projeto = $_POST['id_projeto'] ?? null;
        $nome_aluno = $_POST['nome_aluno'] ?? null;
        $nota_participacao = $_POST['nota_participacao_projeto'] ?? null;
        $observacao = $_POST['obs_participacao_projeto'] ?? null;

        $resposta = $this->projetoModel->postParticiparProjeto($cod_projeto, $nome_aluno, $nota_participacao, $observacao);

        header('Content-Type: application/json');
        echo json_encode($resposta);
        exit;
    }

    //************ALUNOS**************** */

    public function AtualizarAluno($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
            parse_str(file_get_contents("php://input"), $dados);

            if (empty($dados)) {
                http_response_code(400);
                echo json_encode(["erro" => "Nenhum dado enviado para atualizar"]);
                return;
            }

            $resultado = $this->alunoModel->patchAtualizarAluno($dados, $id);

            if ($resultado) {
                http_response_code(200);
                echo json_encode(["mensagem" => "Aluno atualizado com sucesso!"]);
            } else {
                http_response_code(500);
                echo json_encode(["erro" => "Erro ao atualizar o aluno. Erro de servidor."]);
            }
        } else {
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido."]);
        }
    }


}
