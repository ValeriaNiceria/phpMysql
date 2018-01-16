<?php

class Contatos
{
    public $mysqli;
    public $contatos = array();
    public $contato;
    public $anexos = array();

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
        //Protegendo-se contra o SQL Injection
        $nome = $this->mysqli->escape_string($contato['nome']);
        $telefone = $this->mysqli->escape_string($contato['telefone']);
        $email= $this->mysqli->escape_string($contato['email']);
        $descricao = $this->mysqli->escape_string($contato['descricao']);
        $dataNascimento = $this->mysqli->escape_string($contato['dataNascimento']);

        $sqlGravar = "
            INSERT INTO contatos
            (nome, telefone, email, descricao, dataNascimento, favorito)
            VALUES(
            '{$nome}',
            '{$telefone}',
            '{$email}',
            '{$descricao}',
            '{$dataNascimento}',
            '{$contato['favorito']}'
            )

        ";
        $this->mysqli->query($sqlGravar);
    }


    public function gravar_anexo($anexo) 
    {
        $nome = $this->mysqli->escape_string($anexo['nome']);
        $arquivo = $this->mysqli->escape_string($anexo['arquivo']);

        $sqlGravar = "
            INSERT INTO anexo
            (contato_id, nome, arquivo)
            VALUES(
                {$anexo['contato_id']},
                '{$nome}',
                '{$arquivo}'
            )
        ";
        $this->mysqli->query($sqlGravar);
    }


    public function editar_contato($contato) 
    {

        $nome = $this->mysqli->escape_string($contato['nome']);
        $telefone = $this->mysqli->escape_string($contato['telefone']);
        $email= $this->mysqli->escape_string($contato['email']);
        $descricao = $this->mysqli->escape_string($contato['descricao']);
        $dataNascimento = $this->mysqli->escape_string($contato['dataNascimento']);

        $sqlEditar = " 
            UPDATE contatos SET
                nome = '{$nome}',
                telefone = '{$telefone}',
                email = '{$email}',
                descricao = '{$descricao}',
                dataNascimento = '{$dataNascimento}',
                favorito = '{$contato['favorito']}'
            WHERE id = {$contato['id']}
        ";
        $this->mysqli->query($sqlEditar);
    }


    public function remover_contato($id) {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";

        $this->mysqli->query($sqlRemover);
    }


    public function buscar_anexos($contato_id) {
        $sql = "SELECT * FROM anexo WHERE contato_id = {$contato_id}";

        $resultado = $this->mysqli->query($sql);

        $this->anexos = array();

        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $this->anexos[] = $anexo;
        }
    }

}