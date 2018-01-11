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


    public function gravar_tarefa($tarefa) 
    {
        $sqlGravar = "
            INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
            VALUES
            (   
                '{$tarefa['nome']}',
                '{$tarefa['descricao']}',
                '{$tarefa['prioridade']}',
                '{$tarefa['prazo']}',
                '{$tarefa['concluida']}'
            )
        ";
        mysqli_query($this->conexao, $sqlGravar);
    }
    

    public function editar_tarefa($tarefa) {
        $sqlEditar = "
            UPDATE tarefas SET
                nome = '{$tarefa['nome']}',
                descricao = '{$tarefa['descricao']}',
                prioridade = '{$tarefa['prioridade']}',
                prazo = '{$tarefa['prazo']}',
                concluida = '{$tarefa['concluida']}'
            WHERE id = {$tarefa['id']}
        ";
    
        mysqli_query($this->conexao, $sqlEditar);
    }
    

}