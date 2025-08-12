<?php
    class Controller{

        //Função para carregar as views
        public function carregarViews($view, $dados = array()){
            extract($dados);
            require_once '../app/views/'.$view.'.php';            
        }
    }
?>