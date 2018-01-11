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


function gravar_anexo($conexao, $anexo) {
    $sqlGravar = "
        INSERT INTO anexos
        (tarefa_id, nome, arquivo)
        VALUES(
            '{$anexo['tarefa_id']}',
            '{$anexo['nome']}',
            '{$anexo['arquivo']}'
        )
    ";

    mysqli_query($conexao, $sqlGravar);
}


function buscar_anexos($conexao, $tarefa_id) {
    $sql = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
    $resultado = mysqli_query($conexao, $sql);

    $anexos = array();

    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }

    return $anexos;
}