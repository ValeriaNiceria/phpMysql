<?php

class Contatos
{
    public $mysqli;
    public $contatos = array();
    public $contato;

    public function __construct($nova_conexao)
    {
        $this->mysqli = $nova_conexao; 
    }

    public function buscar_contatos(){
        $sqlBusca = 'SELECT * FROM contatos';

        $resultado = $this->mysqli->query($sqlBusca);

        $this->contatos = array();

        while ($contato = mysqli_fetch_assoc($resultado)) {
            $this->contatos[] = $contato;
        }
    }

    public function buscar_contato($id) 
    {
        $sqlBusca = "SELECT * FROM contatos WHERE id = " . $id;

        $resultado = $this->mysqli->query($sqlBusca);

        $this->contato = mysqli_fetch_assoc($resultado);
    }


    public function gravar_contato($contato) 
    {
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
        $this->mysqli->query($sqlGravar);
    }


    public function gravar_anexo($anexo) 
    {
        $sqlGravar = "
            INSERT INTO anexo
            (contato_id, nome, arquivo)
            VALUES(
                {$anexo['contato_id']},
                '{$anexo['nome']}',
                '{$anexo['arquivo']}'
            )
        ";
        $this->mysqli->query($sqlGravar);
    }
}