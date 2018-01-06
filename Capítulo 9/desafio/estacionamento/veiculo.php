<?php 

    session_start();

    include "banco.php";

    $exibir_tabela = true;

    if(isset($_GET['placa']) && $_GET['placa'] != "") {
       
        include "baseVeiculosBanco.php";

        gravar_veiculo($conexao, $veiculo);

        header('Location: veiculo.php');
        die();

    }

    $lista_veiculos = lista_veiculos($conexao);


    $veiculo = array(
        'id' => 0,
        'placa' => '',
        'marca' => '',
        'modelo' => '',
        'hora_entrada' => '',
        'hora_saida' => ''
    );

    include "template.php";