<?php

    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = false;

    $tem_erros = false;
    $erros_validacao = array();

    if (tem_post()) {
       
        $contato = array();
        
        $contato['id'] = $_POST['id'];

        if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
            $contato['nome'] = $_POST['nome'];
        } else {
            $tem_erros = true;
            $erros_validacao['nome'] = 'O nome do contato é obrigatório!';
        }

        if (isset($_POST['telefone']) && strlen($_POST['telefone']) > 0) {
            if (validar_telefone($_POST['telefone'])) {
                $contato['telefone'] = $_POST['telefone'];
            } else {
                $tem_erros = true;
                $erros_validacao['telefone'] = 'O telefone de contato não é válido!';
            }
        }

        if (isset($_POST['email'])) {
            $contato['email'] = $_POST['email'];
        } else {
            $contato['email'] = '';
        }

        if (isset($_POST['descricao'])) {
            $contato['descricao'] = $_POST['descricao'];
        } else {
            $contato['descricao'] = '';
        }

        if (isset($_POST['dataNascimento']) && strlen($_POST['dataNascimento']) > 0) {
            if (validar_data($_POST['dataNascimento'])) {
                $contato['dataNascimento'] = traduz_data_para_banco($_POST['dataNascimento']);
            } else {
                $tem_erros = true;
                $erros_validacao['dataNascimento'] = 'A data informada não é válida!';
            }
        } else {
            $contato['dataNascimento'] = '';
        }

        if (isset($_POST['favorito'])) {
            $contato['favorito'] = 1;
        } else {
            $contato['favorito'] = 0;
        }


        if (! $tem_erros) {
            editar_contato($conexao, $contato);
            
            header('Location: contato.php');
            die();
        }
    }

    $contato = buscar_contato($conexao, $_GET['id']);

    $contato['nome'] = (isset($_POST['nome'])) ? $_POST['nome'] : $contato['nome'];
    $contato['telefone'] = (isset($_POST['telefone'])) ? $_POST['telefone'] : $contato['telefone'];
    $contato['email'] = (isset($_POST['email'])) ? $_POST['email'] : $contato['email'];
    $contato['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : $contato['descricao'];
    $contato['dataNascimento'] = (isset($_POST['dataNascimento'])) ? $_POST['dataNascimento'] : $contato['dataNascimento'];
    $contato['favorito'] = (isset($_POST['favorito'])) ? $_POST['favorito'] : $contato['favorito'];

    include "template.php";