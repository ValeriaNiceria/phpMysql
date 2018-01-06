<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    $tem_erros = false;
    $erros_validacao = array();

    if (tem_post()) {
        
        $contato = array(); 

        if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
            $contato['nome'] = $_POST['nome'];
        } else {
            $tem_erros = true;
            $erros_validacao['nome'] = 'O nome do contato é obrigatório!';
        }

        if (isset($_POST['telefone'])) {
            $contato['telefone'] = $_POST['telefone'];
        } else {
            $contato['telefone'] = '';
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

        if (isset($_POST['dataNascimento'])) {
            $contato['dataNascimento'] = traduz_data_para_banco($_POST['dataNascimento']);
        } else {
            $contato['dataNascimento'] = '';
        }

        if (isset($_POST['favorito'])) {
            $contato['favorito'] = 1;
        } else {
            $contato['favorito'] = 0;
        } 

        if(! $tem_erros) {
            gravar_contato($conexao, $contato);
            
            header('Location: contato.php');
            die();
        }

    }

    $lista_contatos = buscar_contatos($conexao);


    //Limpando os campos do formulario

    $contato = array(
        'id' => 0,
        'nome' => '',
        'telefone' => '',
        'email' => '',
        'descricao' => '',
        'dataNascimento' => '',
        'favorito' => ''
    );

    include "template.php";