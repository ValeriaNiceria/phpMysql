<?php

function traduz_data_para_banco($data) {
    if ($data == "" ) {
        return "";
    }

    $dados = explode("/", $data);

    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_mysql;
}


function traduz_data_para_exibir($data) {
    if ($data == "" || $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}


function traduz_favorito($favorito) {
    if($favorito == 1) {
        return 'Sim';
    }
    return 'Não';
}