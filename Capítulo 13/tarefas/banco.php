<?php

$conexao = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
} 


function remover_tarefa($conexao, $id) {

    $sqlRemover = "
        DELETE FROM tarefas WHERE id = {$id};
    ";

    mysqli_query($conexao, $sqlRemover);

}


function apagar_concluida($conexao) {
    $sqlApaga = "DELETE FROM tarefas WHERE concluida = 1";

    mysqli_query($conexao, $sqlApaga);
}

