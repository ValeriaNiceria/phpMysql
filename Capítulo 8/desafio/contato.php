<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    if((isset($_GET['nome']) && $_GET['nome'] != '')){
        
        include "baseContatosBanco.php";

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