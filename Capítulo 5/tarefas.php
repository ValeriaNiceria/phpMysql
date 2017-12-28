<?php
    session_start(); 

    if(isset($_GET['nome']) && $_GET['nome'] != ''){
        $tarefa = array();

        $tarefa['nome'] = $_GET['nome'];


        if(isset($_GET['descricao'])){
            $tarefa['descricao'] = $_GET['descricao'];
        }else{
            $tarefa['descricao'] = '';
        }

        if(isset($_GET['prazo'])){
            $tarefa['prazo'] = $_GET['prazo'];
        }else{
            $tarefa['prazo'] = '';
        }

        if(isset($_GET['prioridade'])){
            $tarefa['prioridade'] = $_GET['prioridade'];
        }else{
            $tarefa['prioridade'] = '';
        }

        if(isset($_GET['concluida'])){
            $tarefa['concluida'] = $_GET['concluida'];
        }else{
            $tarefa['concluida'] = 'não';
        }

        $_SESSION['lista_tarefas'][] = $tarefa;
    }
    
    if(isset($_SESSION['lista_tarefas'])){
        $lista_tarefas =  $_SESSION['lista_tarefas'];
    }else{
        $lista_tarefas = array();
    }

    include "template.php";