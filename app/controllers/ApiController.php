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
                echo json_encode(['erro' => 'E-mail ou senha são obrigatórios'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                return;
            }

            $aluno = $this->alunoModel->postLoginAluno($email, $senha);

            if ($aluno) {

                //Gerar um token
                $dadosToken = [
                    'id'    => $aluno['id_aluno'],
                    'email' => $aluno['email_aluno'],
                    'exp'   => time() + 3600 // 1 hora de validade
                ];
                $token = AuxiliarToken::gerar($dadosToken);

                if (!class_exists('AuxiliarToken')) {
                    die('AuxiliarToken não foi carregado!');
                }

                echo json_encode([
                    "mensagem"  => "Login realizado com sucesso!",
                    'token'     => $token,
                    //"Aluno"     => $aluno

                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            } else {
                http_response_code(401);
                echo json_encode(['erro' => 'E-mail ou senha inválidos'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
        } else {
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido"]);
        }
    }



    //************ALUNOS**************** */  

  
    public function ListarAlunoId($id)
    {

        // 1. Validação do parâmetro $id
        if (!ctype_digit($id) || (int)$id <= 0) {
            http_response_code(400);
            echo json_encode(["erro" => "ID inválido"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        $id = (int)$id;

        // 2. Validação do token JWT no header Authorization
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            http_response_code(401);
            echo json_encode(["erro" => "Token não fornecido ou malformado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $payload = AuxiliarToken::validar($matches[1]);
        if (!$payload) {
            http_response_code(401);
            echo json_encode(["erro" => "Token inválido ou expirado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        // Ex: $payload['id']

        // 3. Autorização: só permitir acesso ao próprio aluno
        if ($payload['id'] !== $id) {
            http_response_code(403);
            echo json_encode(["erro" => "Acesso negado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // 4. Busca do aluno no banco
        $aluno = $this->alunoModel->getAlunoId($id);
        if (empty($aluno)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum aluno encontrado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }


        // 5. Resposta com dados do aluno
        http_response_code(200);
        echo json_encode($aluno, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    }


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

    //************ FIM ALUNOS**************** */






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

    // Buscar Curso  - REVER
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


    // ************ FIM CURSOS**************


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


    // ************ FIM EMPRESAS****************


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

    // Buscar FUNC por Cargo - Rever
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


    // ************ FIM FUNCIONARIOS********


    // ************PROJETOS***************** - REVER
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

    // REVER
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


    // ************ FIM PROJETOS*****************



}
