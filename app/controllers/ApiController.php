<?php

use PHPMailer\PHPMailer\PHPMailer;

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
        // Autenticação + Autorização
        $this->verificar($id);


        // 🔎 Buscar aluno no banco
        $aluno = $this->alunoModel->getAlunoId($id);

        if (empty($aluno)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum aluno encontrado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Resposta
        echo json_encode($aluno, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    public function AtualizarAluno($id)
    {

         // Autenticação + Autorização
         $this->verificar($id);
         

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




    public function verificar($id)
    {
        // 1. Pega o header Authorization
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

        // 2. Valida se veio no formato "Bearer <token>"
        if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            http_response_code(401);
            echo json_encode(["erro" => "Token não fornecido ou malformatado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }

        // 3. Valida o token recebido
        $payload = AuxiliarToken::validar($matches[1]);
        if (!$payload) {
            http_response_code(401);
            echo json_encode(["erro" => "Token inválido ou expirado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }

        // 4. Confere se o ID no token é o mesmo do recurso solicitado
        if ($payload['id'] !== (int)$id) {
            http_response_code(403);
            echo json_encode(["erro" => "Acesso negado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }

        // 5. Retorna payload se passou em todas as verificações
        return $payload;
    }




    public function recuperarSenhaAluno()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $email = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_EMAIL);
        if (!$email) {
            http_response_code(400);
            echo json_encode(['erro' => 'E-mail é obrigatório'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $aluno = $this->alunoModel->buscarAlunoPorEmail($email);

        // Resposta genérica
        if (!$aluno) {
            http_response_code(200);
            echo json_encode(['mensagem' => 'Se o e-mail existir, enviaremos um link para redefinição'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // 1) Gera TOKEN específico para reset
        $resetToken = AuxiliarToken::gerarReset((int)$aluno['id_aluno'], $aluno['email_aluno'], 3600); // 1h

        // 2) Armazena somente o hash + expiração
        $hash   = hash('sha256', $resetToken);
        $expira = (new DateTime('+1 hour'))->format('Y-m-d H:i:s');

        $this->alunoModel->salvarResetToken((int)$aluno['id_aluno'], $hash, $expira);

        // 3) Monta link
        $link = URL_BASE . "api/redefinirSenha?token={$resetToken}";

        // 4) Envia e-mail
        require 'vendors/email/Exception.php';
        require 'vendors/email/PHPMailer.php';
        require 'vendors/email/SMTP.php';

        $mail = new PHPMailer();

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = EMAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_USER;
            $mail->Password   = EMAIL_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = EMAIL_PORT;



            $mail->setFrom(EMAIL_USER, 'Escola FuturEdu');
            $mail->addAddress($aluno['email_aluno'], $aluno['nome_aluno'] ?? 'Aluno');
            $mail->setLanguage('br');
            $mail->CharSet  = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha';
            $mail->msgHTML("
            Olá, {$aluno['nome_aluno']}!<br><br>
            Recebemos uma solicitação para redefinir sua senha.<br>
            Este link é válido por 1 hora e pode ser usado uma única vez:<br><br>
            <a href='{$link}'>{$link}</a><br><br>
            Se você não fez essa solicitação, ignore este e-mail.
        ");
            $mail->AltBody = "Para redefinir sua senha (válido por 1h), acesse: {$link}";

            $mail->send();

            http_response_code(200);
            echo json_encode(['mensagem' => 'Se o e-mail existir, enviaremos um link para redefinição'], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao enviar e-mail', 'detalhes' => $mail->ErrorInfo], JSON_UNESCAPED_UNICODE);
        }
    }


    public function resetarSenhaAluno()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $tokenClaro = $_POST['token'] ?? null;
        $novaSenha  = $_POST['nova_senha'] ?? null;

        if (!$tokenClaro || !$novaSenha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Token e nova senha são obrigatórios'], JSON_UNESCAPED_UNICODE);
            return;
        }

        if (strlen($novaSenha) < 8) {
            http_response_code(400);
            echo json_encode(['erro' => 'A nova senha deve ter pelo menos 8 caracteres'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // 1) Valida JWT e escopo
        $payload = AuxiliarToken::validarReset($tokenClaro);
        if (!$payload) {
            http_response_code(403);
            echo json_encode(['erro' => 'Token inválido ou expirado'], JSON_UNESCAPED_UNICODE);
            return;
        }

        $idAluno = (int)($payload['sub'] ?? 0);

        // 2) Confere se o token enviado corresponde ao hash salvo e se não expirou
        $hash = hash('sha256', $tokenClaro);
        $alunoToken = $this->alunoModel->getAlunoPorResetHash($hash);

        if (
            !$alunoToken || $idAluno !== (int)$alunoToken['id_aluno'] ||
            empty($alunoToken['reset_token_expires']) ||
            strtotime($alunoToken['reset_token_expires']) < time()
        ) {
            http_response_code(403);
            echo json_encode(['erro' => 'Token inválido ou expirado'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // 3) Atualiza senha com hash seguro
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
        $ok = $this->alunoModel->atualizarSenha($idAluno, $senhaHash);

        if ($ok) {
            // 4) Invalida token
            $this->alunoModel->limparResetToken($idAluno);
            http_response_code(200);
            echo json_encode(['mensagem' => 'Senha redefinida com sucesso'], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao atualizar a senha'], JSON_UNESCAPED_UNICODE);
        }
    }
}
