<?php

include "config.php";
include "banco.php";
include "classes/Tarefas.php";

$tarefa = new Tarefas($conexao);

$tarefa->apagar_concluida();

header('Location: tarefas.php');
die();