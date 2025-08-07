<?php

class LoginController extends Controller
{


    public function entrar()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');

            $funcModel = new Funcionario();
            $usuario = $funcModel->buscarFunc($email, $senha);


            if ($usuario) {
                $tipo       = 'funcionario';
                $tipo_id    = $usuario['id_funcionario'];
                $tipo_nome  = $usuario['nome_funcionario'];
                $tipo_email = $usuario['email_funcionario'];
                $tipo_cargo = $usuario['cargo_funcionario'];
            } else {

                $alunoModel = new Aluno();
                $usuario = $alunoModel->postLoginAluno($email, $senha);

                if ($usuario) {
                    $tipo       = 'aluno';
                    $tipo_id    = $usuario['id_aluno'];
                    $tipo_nome  = $usuario['nome_aluno'];
                    $tipo_email = $usuario['email_aluno'];

                } else {
                    $usuario = null;
                }
            } // FIM DO IF DE VERIFICAÇÃO DO TIPO

            if($usuario){

                $_SESSION['tipo']           = $tipo;
                $_SESSION['tipo_id']        = $tipo_id;
                $_SESSION['tipo_nome']      = $tipo_nome;
                $_SESSION['tipo_email']     = $tipo_email;

                //Redirecionar para a página de Dash
                header('Location:' . URL_BASE .'dash');
                exit;
            }else{
                $_SESSION['erro-login'] = "E-mail ou Senha incorretos";
            }
        }

        
    }
}
