<?php

function tem_post() {
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}

function validar_placa($placa) {
    $padrao = '/^[a-zA-Z]{3}\-[0-9]{4}$/';

    $resultado = preg_match($padrao, $placa);

    return $resultado;
}


function tratar_anexo($anexo) {
    $padrao = '/^.+(\.jpg$|\.png$)$/';

    $resultado = preg_match($padrao, $anexo['name']);

    if(!$resultado){
        return false;
    }

    $file = $_FILES['anexo'];

    $dirUploads = "anexos";

    if (!is_dir($dirUploads)) {
        mkdir($dirUploads, 0777, true) or die ("Não foi possível criar a pasta " . $dirUploads);
    }

    if (move_uploaded_file($file['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $file['name'])) {
        return true;
    }

    return false;
}