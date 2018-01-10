<?php

include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if(tem_post()) {
    //Upload dos anexos

    $veiculo_id = $_POST['veiculo_id'];

    $file = $_FILES['anexo'];

    if (!isset($file)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (tratar_anexo($file)) {
            $anexo = array();

            $anexo['veiculo_id'] = $veiculo_id;
            $anexo['nome'] = $file['name'];
            $anexo['arquivo'] = $file['name'];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie apenas anexos nos formatos "jpg" ou "png" ';
        }
    }

    if (isset($_POST['tipo'])) {
        $anexo['tipo'] = $_POST['tipo'];
    } 

    if (!$tem_erros) {
        gravar_anexo($conexao, $anexo);
    }

}

$veiculo = buscar_veiculo($conexao, $_GET['id']);

include "template_veiculo.php";