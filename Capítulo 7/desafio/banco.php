<?php

    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '54321';
    $bdBanco = 'contatos';

    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

    if (mysqli_connect_errno($conexao)) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }


    function buscar_contatos($conexao){
        $sqlBusca = 'SELECT * FROM contatos';

        $resultado = mysqli_query($conexao, $sqlBusca);

        $contatos = array();

        while ($contato = mysqli_fetch_assoc($resultado)) {
            $contatos[] = $contato;
        }

        return $contatos;
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