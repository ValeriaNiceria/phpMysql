<?php

class Tarefas 
{
    public $conexao;
    public $tarefas = array();

    public function __construct($nova_conexao)
    {
        $this->conexao = $nova_conexao;
    }

}