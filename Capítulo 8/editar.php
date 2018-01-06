<?php

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = false;

if (isset($_GET['nome']) && $_GET['nome'] != '') {
   
    include "baseTarefasBanco.php";
    

    editar_tarefa($conexao, $tarefa);

    header('Location: tarefas.php');
    die();
}

    $tarefa = buscar_tarefa($conexao, $_GET['id']);

    include "template.php";