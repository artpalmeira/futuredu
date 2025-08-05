<?php

class LoginController extends Controller
{

    public function index()
    {
        $dados = array();
        $dados['titulo'] = "Login";

        $this->carregarViews('login', $dados);
    }

    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email_aluno'] ?? '';
            $senha = $_POST['senha_aluno'] ?? '';

            // Requisição para a API no servidor do DASHBOARD
            $url = URL_API . "LoginAluno";

            $postData = http_build_query([
                "email_aluno" => $email,
                "senha_aluno" => $senha
            ]);

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);            
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($response === false) {
                $_SESSION['erro_login'] = "Erro ao conectar com o servidor.";
                header("Location: " . URL_BASE . "index.php?url=login");
                exit;
            }

            curl_close($ch);
            $result = json_decode($response, true);

            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // exit;
            
            if ($httpCode === 200) {
                // Login OK: salvar na sessão
                $_SESSION['aluno'] = $result['Aluno'];

                header("Location: " . URL_BASE . "index.php?url=menu");
                exit;
            } else {
                $_SESSION['erro_login'] = $result['mensagem'] ?? "Credenciais inválidas.";
                header("Location: " . URL_BASE . "index.php?url=login");
                exit;
            }
        }
    }
}
