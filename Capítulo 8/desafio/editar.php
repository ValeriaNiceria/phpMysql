<?php

    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = false;

    if (isset($_GET['nome']) && $_GET['nome'] != '') {
       
        include "baseContatosBanco.php";

        editar_contato($conexao, $contato);
        
        header('Location: contato.php');
        die();
    }

    $contato = buscar_contato($conexao, $_GET['id']);

    include "template.php";