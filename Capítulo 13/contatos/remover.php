<?php

include "config.php";
include "banco.php";

remover_contato($mysqli, $_GET['id']);

header('Location: contatos.php');