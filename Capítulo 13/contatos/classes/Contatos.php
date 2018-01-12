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
}