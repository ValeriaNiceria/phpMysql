<?php

include "config.php";
include "banco.php";

remover_contato($conexao, $_GET['id']);

header('Location: contatos.php');