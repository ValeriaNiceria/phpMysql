<?php

include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if(tem_post()) {
    //Upload dos arquivos
}

$veiculo = buscar_veiculo($conexao, $_GET['id']);

include "template_veiculo.php";