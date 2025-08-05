<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// informar a URL base do projeto
define('URL_BASE', 'http://localhost/futuredu_app/public/');

// informar o caminho base da API que está no sistema-escola
define('URL_API', 'http://localhost/sistema-escola/public/api/');

spl_autoload_register(function ($class) {

    if (file_exists('../app/controllers/' . $class . '.php')) {
        require_once '../app/controllers/' . $class . '.php';
    }

    if (file_exists('../rotas/' . $class . '.php')) {
        require_once '../rotas/' . $class . '.php';
    }
});
