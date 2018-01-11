<?php

class Tarefas 
{
    public $conexao;
    public $tarefas = array();

    public function __construct($nova_conexao)
    {
        $this->conexao = $nova_conexao;
    }


    public function buscar_tarefas($conexao) 
    {
        $sqlBusca = 'SELECT * FROM tarefas';

        $resultado = mysqli_query($this->conexao, $sqlBusca);

        $this->tarefas = array();

        while ($tarefa = mysqli_fetch_assoc($resultado)) 
        {
            $tarefas[] = $tarefa;
        }
    }

}