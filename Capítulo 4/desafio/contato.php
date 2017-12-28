<?php
    session_start();
    
    if(isset($_GET['nome']) && $_GET['nome'] != ''){
        $contato = array();

        $contato['nome'] = $_GET['nome'];

        if(isset($_GET['telefone']) && $_GET['telefone'] != ''){
            $contato['telefone'] = $_GET['telefone'];
        }

        if(isset($_GET['email'])){
            $contato['email'] = $_GET['email'];
        }else{
            $contato['email'] = '';
        }

        $_SESSION['lista_contato'][] = $contato;
    }

    if(isset($_SESSION['lista_contato'])){
        $lista_contato = $_SESSION['lista_contato'];
    }else{
        $lista_contato = array();
    }

    include "template.php";