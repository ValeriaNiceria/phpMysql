<?php

include "config.php";
include "banco.php";
include "classes/Tarefas.php";

$tarefa = new Tarefas($mysqli);

$tarefa->remover_tarefa($_GET['id']);

header('Location: tarefas.php');