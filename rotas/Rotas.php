<?php
    class Rotas{

        public function executar(){
            $url = '/';
            if (isset($_GET['url'])){
                $url .= $_GET['url'];
            }

            $parametro = array();

            //Verificar se existe a URL
            if (!empty($url) && $url != '/'){
                $url = explode('/', $url);
                array_shift($url); //Remove o excesso de barras
                $controladorAtual = ucfirst($url[0]).'Controller';
                array_shift($url);

                if (isset($url[0]) && !empty($url[0])){
                    $acao = $url[0];
                    array_shift($url);
                }else{
                    $acao = 'index';
                }

                //Caso tenha algo a mais na url considerar como parâmetro
                if (count($url) > 0){
                    $parametro = $url;
                }
            }else{
                $controladorAtual = 'LoginController';
                $acao = 'index';
            }

            if (!file_exists('../app/controllers/'.$controladorAtual.'.php')
            ||  !method_exists($controladorAtual, $acao)){
                echo 'Arquivo '. $controladorAtual. ' ou método '.$acao.' não encotrado.';
                $controladorAtual = 'ErroController';
                $acao = 'index';
            }

            $controller = new $controladorAtual;
            call_user_func_array(array($controller, $acao), $parametro);
        }

    }
?>