<?php

$veiculo = array();

    $veiculo['id'] = $_GET['id'];

    $veiculo['placa'] = $_GET['placa'];

    if (isset($_GET['marca'])) {
        $veiculo['marca'] = $_GET['marca'];
    } else {
        $veiculo['marca'] = '';
    }

    if (isset($_GET['modelo'])) {
        $veiculo['modelo'] = $_GET['modelo'];
    } else {
        $veiculo['modelo'] = '';
    }

    if (isset($_GET['hora_entrada'])) {
        $veiculo['hora_entrada'] = $_GET['hora_entrada'];
    } else {
        $veiculo['hora_entrada'] = '';
    }

    if (isset($_GET['hora_saida'])) {
        $veiculo['hora_saida'] = $_GET['hora_saida'];
    } else {
        $veiculo['hora_saida'] = '';
    }