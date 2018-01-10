<?php
    session_start(); 

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    $tem_erros = false;
    $erros_validacao = array();


    if (tem_post()) { //Validando o nome da tarefa
       
        $tarefa = array();
    
        if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) { //strlen - conta o tamanho de um texto
            $tarefa['nome'] = $_POST['nome'];
        } else {
            $tem_erros = true;
            $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
        }
    
        if (isset($_POST['descricao'])) {
            $tarefa['descricao'] = $_POST['descricao'];
        } else {
            $tarefa['descricao'] = '';
        }
    
        if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
            if (validar_data($_POST['prazo'])) {
                $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
            } else {
                $tem_erros = true;
                $erros_validacao['prazo'] = 'O prazo não é uma data válida!';
            }
        } else {
            $tarefa['prazo'] = '';
        }
    
        if (isset($_POST['prioridade'])) {
            $tarefa['prioridade'] = $_POST['prioridade'];
        }else {
            $tarefa['prioridade'] = '1';
        }
    
        if (isset($_POST['concluida'])) {
            $tarefa['concluida'] = 1;
        } else {
            $tarefa['concluida'] = 0;
        }

        if (! $tem_erros) {
            gravar_tarefa($conexao, $tarefa);
            
            //Evitando o problema com a atualização de página
            header('Location: tarefas.php');
            die();
        }
    }
    
    //Buscando dados no banco
    $lista_tarefas = buscar_tarefas($conexao);

    //Verifica se existem dados enviados através do POST para que sejam usados no lugar dos valores em banco
    $tarefa = array(
        'id' => 0,
        'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
        'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
        'prazo' => (isset($_POST['prazo'])) ? traduz_data_para_banco($_POST['prazo']) : '',
        'prioridade' => (isset($_POST['prioridade'])) ? $_POST['prioridade'] : '',
        'concluida' => (isset($_POST['concluida'])) ? $_POST['concluida'] : ''
    );


    include ("template.php");