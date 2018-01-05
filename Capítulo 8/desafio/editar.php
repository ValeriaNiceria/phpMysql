<?php

    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = false;

    if (isset($_GET['nome']) && $_GET['nome'] != '') {
        $contato = array();

        $contato['id'] = $_GET['id'];

        $contato['nome'] = $_GET['nome'];

        if (isset($_GET['telefone'])) {
            $contato['telefone'] = $_GET['telefone'];
        } else {
            $contato['telefone'] = '';
        }

        if (isset($_GET['email'])) {
            $contato['email'] = $_GET['email'];
        } else {
            $contato['email'] = '';
        }

        if (isset($_GET['descricao'])) {
            $contato['descricao'] = $_GET['descricao'];
        } else {
            $contato['descricao'] = '';
        }

        if (isset($_GET['dataNascimento'])) {
            $contato['dataNascimento'] = traduz_data_para_banco($_GET['dataNascimento']);
        } else {
            $contato['dataNascimento'] = '';
        }

        if (isset($_GET['favorito'])) {
            $contato['favorito'] = 1;
        } else {
            $contato['favorito'] = 0;
        }

        editar_contato($conexao, $contato);
        
        header('Location: contato.php');
        die();
    }

    $contato = buscar_contato($conexao, $_GET['id']);

    include "template.php";