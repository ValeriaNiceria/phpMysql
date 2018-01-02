<?php
    session_start();

    if((isset($_GET['nome']) && $_GET['nome'] != '') && (isset($_GET['telefone']) && $_GET['telefone'] != '')){
        $contato = array();

        $contato['nome'] = $_GET['nome'];

        $contato['telefone'] = $_GET['telefone'];

        if(isset($_GET['email'])){
            $contato['email'] = $_GET['email'];
        }else{
            $contato['email'] = '';
        }

        if(isset($_GET['descricao'])){
            $contato['descricao'] = $_GET['descricao'];
        }else{
            $contato['descricao'] = '';
        }

        if(isset($_GET['dtNascimento'])){
            $contato['dtNascimento'] = $_GET['dtNascimento'];
        }else{
            $contato['dtNascimento'] = '';
        }

        if(isset($_GET['favorito'])){
            $contato['favorito'] = $_GET['favorito'];
        }else{
            $contato['favorito'] = 'Não';
        }

        $_SESSION['lista_contato'][] = $contato;


    }

    if(isset($_SESSION['lista_contato'])){
        $lista_contato = $_SESSION['lista_contato'];
    }else{
        $lista_contato = array();
    }

    include "template.php";