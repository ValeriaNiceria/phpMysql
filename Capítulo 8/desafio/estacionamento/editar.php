<?php

session_start();

include "banco.php";

$exibir_tabela = false;

if (isset($_GET['placa']) && $_GET['placa'] != '') {
   
    include "baseVeiculosBanco.php";

    editar_veiculo($conexao, $veiculo);
    
    header('Location: veiculo.php');
    die();
}

$veiculo = buscar_veiculo($conexao, $_GET['id']);

include "template.php";