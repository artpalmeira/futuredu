<?php

class DashController extends Controller{

    public function index(){

        // Fazer um tratamento para lidar com usuário logado
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION['tipo']) || !isset($_SESSION['tipo_id'])){
            header('Location:' . URL_BASE);
        }


        $dados = array();
        $dados['titulo'] = 'DASHBOARD Sistema Escola';
        $this->carregarViews('admin/dash', $dados);


    }

    public function sair(){
        session_unset();
        session_destroy();
        header('Location:' .URL_BASE);
        exit;
    }



}