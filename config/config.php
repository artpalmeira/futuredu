<?php

// palavra-chave define() é usada para criar constantes. 
define('URL_BASE','http://localhost/sistema-escola/public/');
//define('URL_BASE','https://escola.360criativo.com.br/');

// Configurações  do Banco de Dados
define('DB_HOST', 'smpsistema.com.br');
define('DB_NAME', 'u283879542_escola');
define('DB_USER', 'u283879542_escola');
define('DB_PASS', 'Escola@tipi03');


// Configurações do Email
define('EMAIL_HOST', 'smtp.hostinger.com');
define('EMAIL_PORT', '465');
define('EMAIL_USER', 'tipi03@smpsistema.com.br');
define('EMAIL_PASS', 'Senac@tipi03');



// Sistema carregamento automático de class
spl_autoload_register(function ($class){

    //var_dump("Teste da classe: " . $class);

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

