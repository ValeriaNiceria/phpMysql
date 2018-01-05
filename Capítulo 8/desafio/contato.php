<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    if((isset($_GET['nome']) && $_GET['nome'] != '')){
        $contato = array();

        $contato['nome'] = $_GET['nome'];

        if(isset($_GET['telefone'])){
            $contato['telefone'] = $_GET['telefone'];
        }else{
            $contato['telefone'] = '';
        }
        
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

        if(isset($_GET['dataNascimento'])){
            $contato['dataNascimento'] = traduz_data_para_banco($_GET['dataNascimento']);
        }else{
            $contato['dataNascimento'] = '';
        }

        if(isset($_GET['favorito'])){
            $contato['favorito'] = 1;
        }else{
            $contato['favorito'] = 0;
        }

       gravar_contato($conexao, $contato);

       header('Location: contato.php');
       die();

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