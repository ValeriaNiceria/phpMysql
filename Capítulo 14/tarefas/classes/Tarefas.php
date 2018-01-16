<?php

class Tarefas 
{
    public $mysqli;
    public $tarefas = array();
    public $tarefa;
    public $anexos = array();
    public $anexo;

    public function __construct($nova_conexao)
    {
        $this->mysqli = $nova_conexao;
    }


    public function buscar_tarefas() 
    {
        $sqlBusca = 'SELECT * FROM tarefas';

        $resultado = $this->mysqli->query($sqlBusca);

        $this->tarefas = array();

        while ($tarefa = mysqli_fetch_assoc($resultado)) 
        {
            $this->tarefas[] = $tarefa;
        }

    }


    public function buscar_tarefa($id) 
    {
        $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
    
        $resultado = $this->mysqli->query($sqlBusca);
    
        $this->tarefa = mysqli_fetch_assoc($resultado);
    }

    //Protegendo-se contra SQL Injection
    public function gravar_tarefa($tarefa) 
    {
        $nome = $this->mysqli->escape_string($tarefa['nome']);
        $descricao = $this->mysqli->escape_string($tarefa['descricao']);
        $prazo = $this->mysqli->escape_string($tarefa['prazo']);

        $sqlGravar = "
            INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida)
            VALUES
            (   
                '{$nome}',
                '{$descricao}',
                '{$tarefa['prioridade']}',
                '{$prazo}',
                '{$tarefa['concluida']}'
            )
        ";
        $this->mysqli->query($sqlGravar);
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
    
        $this->mysqli->query($sqlEditar);
    }


    public function gravar_anexo($anexo)
    {
        $sqlGravar = "
            INSERT INTO anexos
            (tarefa_id, nome, arquivo)
            VALUES(
                '{$anexo['tarefa_id']}',
                '{$anexo['nome']}',
                '{$anexo['arquivo']}'
            )
        ";
    
        $this->mysqli->query($sqlGravar);
    }


    public function buscar_anexos($tarefa_id) {
        $sql = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
        $resultado = $this->mysqli->query($sql);
    
        $this->anexos = array();
    
        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $this->anexos[] = $anexo;
        }
    }


    public function remover_tarefa($id) 
    {
        $sqlRemover = "DELETE FROM tarefas WHERE id = {$id};";
        
        $this->mysqli->query($sqlRemover);
        
    }        
    

    public function apagar_concluida() {
        $sqlApaga = "DELETE FROM tarefas WHERE concluida = 1";
    
        $this->mysqli->query($sqlApaga);
    }

}