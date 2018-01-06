<?php
    session_start(); 

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    if(isset($_GET['nome']) && $_GET['nome'] != ''){
       
        include "baseTarefasBanco.php";

        gravar_tarefa($conexao, $tarefa);

        //Evitando o problema com a atualização de página
        header('Location: tarefas.php');
        die();
    }
    
    //Buscando dados no banco
    $lista_tarefas = buscar_tarefas($conexao);

    
    $tarefa = array(
        'id' => 0,
        'nome' => '',
        'descricao' => '',
        'prazo' => '',
        'prioridade' => 1,
        'concluida' => ''
    );


    include "template.php";