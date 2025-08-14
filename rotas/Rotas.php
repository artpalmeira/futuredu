<?php

class Rotas
{


    //Método inicializador das ROTAS
    public function executar()
    {

        $url = '/';

        if (isset($_GET['url'])) {

            $url .= $_GET['url'];
            //var_dump($url);
        }

        $parametro =  array();
        // // parametro[0][1][2][3]

        // Verifica se a URL não está vazia  e não é apenas uma /
        if (!empty($url) && $url != '/') {

            /*
                servico/detalhe/7
                1- Controller (TurmeController)
                2- Método 
                3- Parametro
            */
            $url = explode('/', $url);


            array_shift($url); // Remover a barra

            $controladorAtual = ucfirst($url[0]) . 'Controller';

            //var_dump($controladorAtual);
            array_shift($url); // Remover a primeira casa do vetor

            if (isset($url[0]) && !empty($url[0])) {

                $acaoAtual = $url[0];
                array_shift($url);
            } else {
                $acaoAtual = 'index';
                //echo $acaoAtual;
            }

            if (count($url) > 0) {
                $parametro = $url;
            }
        } else {
            $controladorAtual = 'HomeController';
            $acaoAtual = 'index';
        }

       //var_dump($controladorAtual);
        //var_dump($acaoAtual);

        // Somente vefica se não existe o Controller e Ação detro da pasta app/cpntrollers
        if (!file_exists('../app/controllers/' . $controladorAtual . '.php') || !method_exists($controladorAtual, $acaoAtual)) {

            echo 'CHEGUEI AQUI - Não existe o ' . $controladorAtual . ' e nem a ação atual: ' . $acaoAtual;

            $controladorAtual = 'ErroController';
            $acaoAtual = 'index';
        }

        //Criar a INSTACIA do controller atual

        $controller = new $controladorAtual();

        call_user_func_array(array($controller,$acaoAtual), $parametro);

    }
}
