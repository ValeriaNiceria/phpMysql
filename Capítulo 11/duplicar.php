<?php

include "config.php";
include "banco.php";

$tarefa = buscar_tarefa($conexao, $_GET['id']);

gravar_tarefa($conexao, $tarefa);

header('Location: tarefas.php');
die();