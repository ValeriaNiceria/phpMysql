<?php

class Tarefas 
{
    public $conexao;
    public $tarefas = array();
    public $tarefa;

    public function __construct($nova_conexao)
    {
        $this->conexao = $nova_conexao;
    }


    public function buscar_tarefas() 
    {
        $sqlBusca = 'SELECT * FROM tarefas';

        $resultado = mysqli_query($this->conexao, $sqlBusca);

        $this->tarefas = array();

        while ($tarefa = mysqli_fetch_assoc($resultado)) 
        {
            $this->tarefas[] = $tarefa;
        }

    }


    public function buscar_tarefa($id) 
    {
        $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
    
        $resultado = mysqli_query($this->conexao, $sqlBusca);
    
        $this->tarefa = mysqli_fetch_assoc($resultado);
    }

}