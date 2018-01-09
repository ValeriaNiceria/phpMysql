<?php

include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    //upload dos anexos
}

$contato = buscar_contato($conexao, $_GET['id']);


include "template_contato.php";