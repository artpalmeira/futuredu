<?php

use PHPMailer\PHPMailer\PHPMailer;

class ContatoController extends Controller
{


    public function index()
    {

        $dados = array();

        $this->carregarViews('contato', $dados);
    }

    public function enviarEmail()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $fone = filter_input(INPUT_POST, 'fone', FILTER_SANITIZE_NUMBER_INT);
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
            $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

            $status = 'Pendente';

            date_default_timezone_set('America/Sao_Paulo');
            $dataHora = date('Y-m-d H:i:s');

            if ($nome && $email && $msg) {

                $contatoModel = new Contato();

                $salvar = $contatoModel->salvarEmail($nome, $email, $fone, $assunto, $msg, $status, $dataHora);

                if ($salvar) {

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

                        //Recipients
                        $mail->setFrom(EMAIL_USER, $assunto);       // Disparo (Mandou o email)
                        $mail->addAddress(EMAIL_USER, $assunto);    // Quem recebe                        

                        //Content
                        $mail->isHTML(true);
                        $mail->Subject = $assunto;
                        $mail->msgHTML("
                            Nome: $nome <br>
                            Email: $email <br>
                            Telefone: $fone <br>
                            Mensagem: $msg <br>");

                        $mail->AltBody = "
                            Nome: $nome \n
                            Email: $email \n
                            Telefone: $fone \n
                            Mensagem: $msg \n";

                        $mail->send();

                        $dados = array(
                            'mensagem'  => 'Obrigado pelo seu contato, em breve responderemos',
                            'status'    => 'contato'
                        );

                        $this->carregarViews('contato', $dados);


                    } catch (Exception $e) {

                        $dados = array(
                            'mensagem'  => 'Não foi possível enviar sua mensagem',
                            'status'    => 'erro',
                            'nome'      => $nome,
                            'email'     => $email
                        );

                        error_log('Erro ao enviar o email' . $mail->ErrorInfo);

                        $this->carregarViews('contato', $dados);
                        
                    }
                }
            }
        }else{
            $dados = array();
            $this->carregarViews('contato', $dados);
        }
    }
}
