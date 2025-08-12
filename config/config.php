<?php

// palavra-chave define() é usada para criar constantes. 
define('URL_BASE','https://futuredu.smpsistema.com.br/');
//define('URL_BASE','https://escola.360criativo.com.br/');

// Configurações  do Banco de Dados
define('DB_HOST', 'br61-cp.valueserver.com.br');
define('DB_NAME', 'alve6465_escola');
define('DB_USER', 'alve6465_smpsistema');
define('DB_PASS', 'Senac@SMP');


// Configurações do Email
define('EMAIL_HOST', 'br61-cp.valueserver.com.br');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'tipi03@futuredu.smpsistema.com.br');
define('EMAIL_PASS', 'Senac@tipi03');



// Sistema carregamento automático de class
spl_autoload_register(function ($class){

    //var_dump($class);

    if(file_exists('../app/controllers/'. $class . '.php')){
                  //../app/controllers/HomeController.php
        require_once '../app/controllers/'. $class . '.php';
    }

    if(file_exists('../app/models/'. $class .'.php')){
        require_once '../app/models/'. $class .'.php';
    }

    if(file_exists('../rotas/'. $class .'.php')){
        require_once '../rotas/'. $class .'.php';
    }

});

