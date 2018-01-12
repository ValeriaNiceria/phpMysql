<?php

    $mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

    if ($mysqli->connect_errno) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }


    function gravar_contato($conexao, $contato) {
        $sqlGravar = "
            INSERT INTO contatos
            (nome, telefone, email, descricao, dataNascimento, favorito)
            VALUES(
            '{$contato['nome']}',
            '{$contato['telefone']}',
            '{$contato['email']}',
            '{$contato['descricao']}',
            '{$contato['dataNascimento']}',
            '{$contato['favorito']}'
            )

        ";
        mysqli_query($conexao, $sqlGravar);
    }


    function buscar_contato($conexao, $id) {
        $sqlBusca = "SELECT * FROM contatos WHERE id = " . $id;

        $resultado = mysqli_query($conexao, $sqlBusca);

        return mysqli_fetch_assoc($resultado);
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

    
    function gravar_anexo($conexao, $anexo) {
        $sqlGravar = "
            INSERT INTO anexo
            (contato_id, nome, arquivo)
            VALUES(
                {$anexo['contato_id']},
                '{$anexo['nome']}',
                '{$anexo['arquivo']}'
            )
        ";
        mysqli_query($conexao, $sqlGravar);
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