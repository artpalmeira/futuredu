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
        $dados['titulo'] = 'Área de Atuação - FuturEdu';

        $this->carregarViews('api', $dados);
    }


    // ===================================================================
    // ======================= ROTAS DE NEGÓCIO ==========================
    // ===================================================================


    // ===================================================================
    // ============================= LOGIN ===============================
    // ===================================================================


    /**
     * POST /api/LoginAluno
     * @return void
     * Autentica o aluno com base em e-mail e senha.
     * Retorna um token JWT válido por 1 hora.
     */
    public function LoginAluno()
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Coleta e valida os dados
        $email = $_POST['email_aluno'] ?? null;
        $senha = $_POST['senha_aluno'] ?? null;

        if (empty($email) || empty($senha)) {
            http_response_code(400);
            echo json_encode(['erro' => 'E-mail e senha são obrigatórios'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Busca o aluno pelo e-mail
        $aluno = $this->alunoModel->postLoginAluno($email); // Método retorna aluno + senha_hash

        // Valida a senha com o hash salvo no banco
        if ($aluno && password_verify($senha, $aluno['senha_aluno'])) {
            $dadosToken = [
                'id'    => $aluno['id_aluno'],
                'email' => $aluno['email_aluno'],
                'exp'   => time() + 3600, // Token válido por 1h
            ];

            $token = AuxiliarToken::gerar($dadosToken);

            echo json_encode([
                'mensagem' => 'Login realizado com sucesso!',
                'token'    => $token
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(401);
            echo json_encode(['erro' => 'E-mail ou senha inválidos'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }



    // ===================================================================
    // ============================= ALUNO ===============================
    // ===================================================================

    /**
     * GET /api/ListarAluno/{id}
     * @param mixed $id
     * @return void
     * Retorna dados do aluno autenticado.
     */
    public function ListarAlunoId($id)
    {
        // Autenticação do aluno com base no token JWT
        $this->verificar($id);

        // Busca os dados do aluno no banco de dados
        $aluno = $this->alunoModel->getAlunoId($id);

        // Verifica se aluno foi encontrado
        if (empty($aluno)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum aluno encontrado"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Retorna os dados do aluno
        echo json_encode($aluno, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/ListarCursosDoAluno/{id}
     * @param mixed $id
     * @return void
     * Lista os cursos em que o aluno está matriculado (autenticado por token)
     */
    public function ListarCursosDoAluno($id)
    {
        // Autenticação obrigatória
        $this->verificar($id);

        // Buscar cursos do aluno
        $cursos = $this->alunoModel->getCursosDoAluno($id);

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado para este aluno."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/aluno/notasAluno/{idAluno}/{idSigla}
     * @param mixed $idAluno
     * @param mixed $idSigla
     * @return void
     * Retorna todas as notas do aluno no curso informado.     
     */
    public function ListarNotasAlunoPorSigla($idAluno, $idSigla)
    {
        // Valida se o token corresponde ao aluno da rota
        $this->verificar($idAluno);

        // Busca as notas no banco de dados
        $notas = $this->alunoModel->getNotasPorCurso((int)$idAluno, (int)$idSigla);

        if (empty($notas)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhuma nota encontrada para este curso."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($notas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/aluno/ListarMediasAluno/{idAluno}
     * @param mixed $idAluno
     * @return void
     * Retorna a média das notas por curso para o aluno autenticado.
     */
    public function ListarMediasAluno($idAluno)
    {
        // Verifica se o token é válido para o aluno informado
        $this->verificar($idAluno);

        // Busca médias no banco de dados
        $medias = $this->alunoModel->getMediasPorCurso((int)$idAluno);

        if (empty($medias)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhuma média encontrada para este aluno."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($medias, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/ListarNotificacao/{idAluno}
     * @param mixed $idAluno
     * @return void
     * Retorna todas as notificacões do aluno.
     */
    public function ListarNotificacao($idAluno)
    {
        // Valida se o token corresponde ao aluno da rota
        $this->verificar($idAluno);

        // Busca as notas no banco de dados
        $notificacao = $this->alunoModel->getNotificacaoDoAluno((int)$idAluno);

        if (empty($notificacao)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhuma notificação para esse aluno ."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        header('Content-Type: application/json; charset=utf-8'); // garante retorno em JSON
        echo json_encode($notificacao, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * PATCH /api/AtualizarNotificacao/{idNotificacao}
     * @param mixed $idNotificacao
     * @return void
     * Atualiza o status da notificação (ex.: ENVIADO → LIDO, ou APAGADO)
     */
    public function AtualizarNotificacao($idNotificacao)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido."]);
            return;
        }

        parse_str(file_get_contents("php://input"), $dados);

        if (empty($dados['status'])) {
            http_response_code(400);
            echo json_encode(["erro" => "Nenhum status enviado para atualizar"]);
            return;
        }

        $status = $dados['status'];

        $resultado = $this->alunoModel->patchAtualizarNotificacao((int)$idNotificacao, $status);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(["mensagem" => "Notificação atualizada com sucesso!"]);
        } else {
            http_response_code(500);
            echo json_encode(["erro" => "Erro ao atualizar a notificação."]);
        }
    }


    /**
     * GET /api/aluno/ListarProjetosDoAluno/{idAluno}
     * @param mixed $idAluno
     * @return void
     * Retorna os projetos em que o aluno participou.
     */
    public function ListarProjetosDoAluno($idAluno)
    {

        // Valida o token e confere se pertence ao aluno da rota
        $this->verificar($idAluno);

        $projetos = $this->alunoModel->getProjetosDoAluno((int)$idAluno);

        if (empty($projetos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum projeto encontrado para este aluno."], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        echo json_encode($projetos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    /**
     * POST /api/aluno
     * @return void
     *  Cadastra um novo aluno com todos os campos relevantes
     */
    public function CadastrarAluno()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        // Coleta todos os campos da tabela

        $dataAtual = date('Y-m-d H:i:s');

        $dados = [
            'nome_aluno'            => $_POST['nome_aluno']            ?? null,
            'nome_social_aluno'     => $_POST['nome_social_aluno']     ?? null,
            'cpf_aluno'             => $_POST['cpf_aluno']             ?? null,
            'rg_aluno'              => $_POST['rg_aluno']              ?? null,
            'data_nasc_aluno'       => $_POST['data_nasc_aluno']       ?? null,
            'email_aluno'           => $_POST['email_aluno']           ?? null,
            'senha_aluno'           => $_POST['senha_aluno']           ?? null,
            'telefone1_aluno'       => $_POST['telefone1_aluno']       ?? null,
            'telefone2_aluno'       => $_POST['telefone2_aluno']       ?? null,
            'cep_aluno'             => $_POST['cep_aluno']             ?? null,
            'endereco_aluno'        => $_POST['endereco_aluno']        ?? null,
            'numero_aluno'          => $_POST['numero_aluno']          ?? null,
            'complemento_aluno'     => $_POST['complemento_aluno']     ?? null,
            'bairro_aluno'          => $_POST['bairro_aluno']          ?? null,
            'cidade_aluno'          => $_POST['cidade_aluno']          ?? null,
            'estado_aluno'          => $_POST['estado_aluno']          ?? null,
            'foto_aluno'            => 'sem-foto.jpg',
            'alt_aluno'             => $_POST['alt_aluno']             ?? null,
            'nome_responsavel'      => $_POST['nome_responsavel']      ?? null,
            'telefone_responsavel'  => $_POST['telefone_responsavel']  ?? null,
            'email_responsavel'     => $_POST['email_responsavel']     ?? null,
            'data_criacao_aluno'    => $dataAtual,
            'data_atualizacao_aluno' => $dataAtual,
            'status_aluno'          => 'Ativo',
        ];

        // Esse foreach está percorrendo o array $dados
        // foreach ($dados as $chave => $valor) {
        //     var_dump(":{$chave}", $valor);
        //     // Todos os dados vindos do $_POST
        //     // $chave representa o nome do campo (ex: nome_aluno, email_aluno)
        //     // $valor representa o conteúdo que foi enviado para esse campo
        // }

        // Verificação de alguns dados ( campos obrigatórios )
        if (!$dados['nome_aluno'] || !$dados['email_aluno'] || !$dados['senha_aluno'] || !$dados['cpf_aluno']) {
            http_response_code(400);
            echo json_encode(['erro' => 'Campos obrigatórios ausentes.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // // Gera hash da senha
        $dados['senha_aluno'] = password_hash($dados['senha_aluno'], PASSWORD_DEFAULT);


        // // Salva no banco via model
        $ok = $this->alunoModel->novoAluno($dados);

        // var_dump($ok);

        if ($ok) {
            http_response_code(201);
            echo json_encode(['mensagem' => 'Aluno cadastrado com sucesso!'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao cadastrar o aluno.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }


    /**
     * POST /api/aluno/AtualizarFotoAluno/$id
     * @param mixed $idAluno
     * @return void
     * Atualizar foto do aluno
     * - Tipos de arquivos permitidos: Somente JPG, JPEG e PNG são aceitos.
     * - Tamanho máximo do arquivo: Não pode ultrapassar 2 MB (megabytes).
     * - Formatação do nome da imagem: aluno_{id}_{nome}.{extensão}  | Exemplo: aluno_15_maria-silva.jpg
     */
    public function AtualizarFotoAluno($idAluno)
    {

        // Valida o token e confere se pertence ao aluno da rota
        $this->verificar($idAluno);

        $idAluno = (int) $idAluno; // vindo da URL: /api/aluno/atualizar-foto/{id}


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        if (!isset($_FILES['foto_aluno'])) {
            http_response_code(400);
            echo json_encode(['erro' => 'Arquivo de imagem não enviado.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $arquivo = $_FILES['foto_aluno'];

        // Validação básica
        $permitidos = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($arquivo['type'], $permitidos)) {
            http_response_code(400);
            echo json_encode(['erro' => 'Formato de imagem não suportado. Use JPG ou PNG.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        if ($arquivo['size'] > 2 * 1024 * 1024) { // 2MB
            http_response_code(400);
            echo json_encode(['erro' => 'Imagem muito grande. Máximo 2MB.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Gera novo nome de arquivo
        $aluno = $this->alunoModel->getAlunoId($idAluno);

        if (!$aluno) {
            http_response_code(404);
            echo json_encode(['erro' => 'Aluno não encontrado'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        $novoNome = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $aluno[0]['nome_aluno']), '-'));
        $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);

        $novoNome = "aluno_{$idAluno}_{$novoNome}.{$extensao}";

        $caminho = "upload/aluno/" . $novoNome;

        // Move o arquivo
        if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao salvar a imagem.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }

        // Atualiza no banco
        $ok = $this->alunoModel->atualizarFoto($idAluno, $novoNome);


        if ($ok) {
            http_response_code(200);
            echo json_encode(['mensagem' => 'Foto atualizada com sucesso!', 'foto' => $novoNome], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro ao atualizar no banco de dados.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }


    /**
     * PATCH /api/aluno/{id}
     * @param mixed $id
     * @return void
     * Atualiza dados do aluno.
     */
    public function AtualizarAluno($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
            http_response_code(405);
            echo json_encode(["erro" => "Método não permitido."]);
            return;
        }

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
    }



    /**
     * Summary of verificar
     * @param mixed $id
     * @return array
     */
    public function verificar($id)
    {
        // 1. Pega o header Authorization
        $authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? '';

        //$headers = getallheaders();
        //$authHeader = $headers['Authorization'] ?? '';

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

    /**
     * Summary of recuperarSenhaAluno
     * @return void
     */
    public function recuperarSenhaAluno()
    {
        // Verificação do método HTTP
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['erro' => 'Método não permitido'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // Validação do campo email_aluno
        $email = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_EMAIL);
        if (!$email) {
            http_response_code(400);
            echo json_encode(['erro' => 'E-mail é obrigatório'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // Busca o aluno no banco de dados
        $aluno = $this->alunoModel->buscarAlunoPorEmail($email);

        // Resposta genérica para não expor e-mails
        if (!$aluno) {
            http_response_code(200);
            echo json_encode(['mensagem' => 'Se o e-mail existir, enviaremos um link para redefinição'], JSON_UNESCAPED_UNICODE);
            return;
        }

        // Gera TOKEN específico para reset
        $resetToken = AuxiliarToken::gerarReset((int)$aluno['id_aluno'], $aluno['email_aluno'], 3600);
        // Gera um token JWT válido por 1 hora (3600 segundos).
        // Usa o método gerarReset() que define o escopo como pwd_reset.
        // Esse token será enviado ao usuário.


        // Criação do hash e definição do tempo de expiração
        $hash   = hash('sha256', $resetToken);
        $expira = (new DateTime('+1 hour'))->format('Y-m-d H:i:s');

        // Armazena no banco
        $this->alunoModel->salvarResetToken((int)$aluno['id_aluno'], $hash, $expira);

        // Monta link
        $link = URL_APP . "index.php?url=login/redefinirSenha/token={$resetToken}";
        // Aqui estamos usando em URL_APP uma variável definida no arquivo config

        // Envia e-mail
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

                <a href='{$link}' style='
                    display: inline-block;
                    padding: 10px 20px;
                    font-size: 16px;
                    color: #fff;
                    background-color: #28a745;
                    text-decoration: none;
                    border-radius: 5px;
                '>
                    Redefinir Senha
                </a><br><br>

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

    /**
     * Summary of resetarSenhaAluno
     * @return void
     */
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



    // ===================================================================
    // ============================ CURSOS ===============================
    // ===================================================================

    /**
     * GET /api/cursos
     * Lista todos os cursos em ordem alfabética.
     */
    public function ListarCursos()
    {
        $cursos = $this->cursoModel->getTodosCurso();

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }

        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/cursos/aleatorios
     * Lista cursos de forma aleatória.
     */
    public function ListarCursosAleatorio()
    {
        $cursos = $this->cursoModel->getCursoRand();

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }

        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/cursos/busca/{termo}
     * Busca cursos com base em um termo.
     */
    public function ListarCursoBusca($curso)
    {
        $cursos = $this->cursoModel->getCursoBusca($curso);

        if (empty($cursos)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            return;
        }

        echo json_encode($cursos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }



    // ===================================================================
    // ============================ EMPRESAS ==============================
    // ===================================================================


    /**
     * GET /api/empresas
     * Lista todas as empresas em ordem alfabética.
     */
    public function ListarEmpresas()
    {
        $empresas = $this->empresaModel->getEmpresas();

        if (empty($empresas)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhuma empresa encontrada"]);
            return;
        }

        echo json_encode($empresas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    // ===================================================================
    // ========================== FUNCIONARIOS ===========================
    // ===================================================================

    /**
     * GET /api/funcionarios
     * Lista todos os funcionários com seus dados completos.
     */
    public function ListarFuncionariosDados()
    {
        $funcionarios = $this->funcionarioModel->getDadosFuncionario();

        if (empty($funcionarios)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum funcionário encontrado"]);
            return;
        }

        echo json_encode($funcionarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     * GET /api/funcionarios/cargo/{cargo}
     * Lista funcionários filtrando pelo cargo.
     */
    public function ListarFuncionariosCargo($cargo)
    {
        $funcionarios = $this->funcionarioModel->getFuncionariosCargo($cargo);

        if (empty($funcionarios)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum funcionário encontrado"]);
            return;
        }

        echo json_encode($funcionarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    // ===================================================================
    // ============================ PROJETOS =============================
    // ===================================================================


    /**
     * POST /api/projetos
     * Cadastra um novo projeto no banco de dados.
     */
    public function NovoProjeto()
    {
        $titulo         = $_POST['titulo_projeto'] ?? null;
        $descricao      = $_POST['descricao_projeto'] ?? null;
        $cod_professor  = $_POST['id_professor'] ?? null;
        $cod_sigla      = $_POST['id_sigla'] ?? null;
        $data_inicio    = $_POST['data_inicio_projeto'] ?? null;
        $data_entrega   = $_POST['data_entrega_projeto'] ?? null;
        $status_projeto = $_POST['status_projeto'] ?? null;
        $url_projeto    = $_POST['url_projeto'] ?? null;

        $resposta = $this->projetoModel->postNovoProjeto(
            $titulo,
            $descricao,
            $cod_professor,
            $cod_sigla,
            $data_inicio,
            $data_entrega,
            $status_projeto,
            $url_projeto
        );

        header('Content-Type: application/json');
        echo json_encode($resposta);
        exit;
    }

    /**
     * POST /api/projetos/participar
     * Registra a participação de um aluno em um projeto.
     */
    public function ParticiparProjeto()
    {
        $cod_projeto        = $_POST['id_projeto'] ?? null;
        $nome_aluno         = $_POST['nome_aluno'] ?? null;
        $nota_participacao  = $_POST['nota_participacao_projeto'] ?? null;
        $observacao         = $_POST['obs_participacao_projeto'] ?? null;

        $resposta = $this->projetoModel->postParticiparProjeto(
            $cod_projeto,
            $nome_aluno,
            $nota_participacao,
            $observacao
        );

        header('Content-Type: application/json');
        echo json_encode($resposta);
        exit;
    }


}
