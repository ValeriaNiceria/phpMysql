<?php

include "config.php";
include "banco.php";
include "classes/Tarefas.php";

$tarefa = new Tarefas($mysqli);

$tarefa->buscar_tarefa($_GET['id']);
$tarefa = $tarefa->tarefa; 

$tarefa->gravar_tarefa($tarefa);

header('Location: tarefas.php');
die();