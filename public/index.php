<?php

session_start();

// Carregando das configurações iniciais
require_once('../config/config.php');


$caminho = new Rotas();
$caminho->executar();
