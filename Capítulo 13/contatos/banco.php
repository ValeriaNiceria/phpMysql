<?php

    $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

    if ($mysqli->connect_errno) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }


    function editar_contato($conexao, $contato) {
        $sqlEditar = " 
            UPDATE contatos SET
                nome = '{$contato['nome']}',
                telefone = '{$contato['telefone']}',
                email = '{$contato['email']}',
                descricao = '{$contato['descricao']}',
                dataNascimento = '{$contato['dataNascimento']}',
                favorito = '{$contato['favorito']}'
            WHERE id = {$contato['id']}
        ";
        mysqli_query($conexao, $sqlEditar);
    }


    function remover_contato($conexao, $id) {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";

        mysqli_query($conexao, $sqlRemover);
    }


    function buscar_anexos($conexao, $contato_id) {
        $sql = "SELECT * FROM anexo WHERE contato_id = {$contato_id}";

        $resultado = mysqli_query($conexao, $sql);

        $anexos = array();

        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $anexos[] = $anexo;
        }

        return $anexos;
    }