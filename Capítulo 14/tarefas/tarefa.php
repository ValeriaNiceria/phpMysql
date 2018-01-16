<?php

include "config.php";
include "banco.php";
include "ajudantes.php";
include "classes/Tarefas.php";

$tarefas = new Tarefas($mysqli);

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    //upload dos anexos
    $tarefa_id = $_POST['tarefa_id'];

    $file = $_FILES["anexo"];

    if (!isset($file)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (tratar_anexo($file)) {
            $anexo = array();

            $anexo['tarefa_id'] = $tarefa_id;
            $anexo['nome'] = $file['name'];
            $anexo['arquivo'] = $file['name'];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie apenas anexos nos formatos pdf ou zip';
        }
    }

    if (!$tem_erros) {
        $tarefas->gravar_anexo($anexo);
    }
}

$tarefas->buscar_tarefa($_GET['id']);
$tarefa = $tarefas->tarefa;

$tarefas->buscar_anexos($_GET['id']);
$anexo = $tarefas->anexo;


include "template_tarefa.php";