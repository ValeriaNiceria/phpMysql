<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '54321';
$bdBanco = 'estacionamento';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if(mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}


function lista_veiculos($conexao) {
    $sqlBusca = 'SELECT * FROM veiculos';

    $resultado = mysqli_query($conexao, $sqlBusca);

    $veiculos = array();

    while($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }

    return $veiculos;
}


function gravar_veiculo($conexao, $veiculo) {
    $sqlGravar = "
        INSERT INTO veiculos 
        (placa, marca, modelo, hora_entrada, hora_saida)
        VALUES
        (
            '{$veiculo['placa']}',
            '{$veiculo['marca']}',
            '{$veiculo['modelo']}',
            '{$veiculo['hora_entrada']}',
            '{$veiculo['hora_saida']}'
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}


function buscar_veiculo($conexao, $id) {
    $sqlBusca = "SELECT * FROM veiculos WHERE id = " . $id;

    $resultado = mysqli_query($conexao, $sqlBusca);

    return mysqli_fetch_assoc($resultado);
}


function editar_veiculo($conexao, $veiculo) {
    $sqlEditar = "
        UPDATE veiculos SET
            placa = '{$veiculo['placa']}',
            marca = '{$veiculo['marca']}',
            modelo = '{$veiculo['modelo']}',
            hora_entrada = '{$veiculo['hora_entrada']}',
            hora_saida = '{$veiculo['hora_saida']}'
        WHERE id = {$veiculo['id']}
    ";
    mysqli_query($conexao, $sqlEditar);
}


function remover_veiculo($conexao, $id) {
    $sqlRemover = "DELETE FROM veiculos WHERE id = " . $id;

    mysqli_query($conexao, $sqlRemover);
}


function gravar_anexo($conexao, $anexo) {
    $sqlGravar = "
    INSERT INTO anexos
        (veiculo_id, nome, arquivo, tipo)
    VALUES(
        {$anexo['veiculo_id']},
        '{$anexo['nome']}',
        '{$anexo['arquivo']}',
        '{$anexo['tipo']}'
    )
    ";
    mysqli_query($conexao, $sqlGravar);
}


function buscar_anexos($conexao, $veiculo_id) {
    $sql = "SELECT * FROM anexos WHERE veiculo_id = {$veiculo_id}";

    $resultado = mysqli_query($conexao, $sql);

    $anexos = array();

    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }

    return $anexos;
}