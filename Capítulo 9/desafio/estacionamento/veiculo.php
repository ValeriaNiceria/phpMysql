<?php 

    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;

    $tem_erros = false;
    $erros_validacao = array();

    if(tem_post()) {
       
        $veiculo = array();
    
        if (isset($_POST['placa']) && strlen($_POST['placa']) > 0) {
            if (validar_placa($_POST['placa'])) {
                $veiculo['placa'] = $_POST['placa'];
            } else {
                $tem_erros = true;
                $erros_validacao['placa'] = 'A placa informada é inválida!';
            }
        } else {
            $tem_erros = true;
            $erros_validacao['placa'] = 'A placa informada é inválida!';
        }
        
        if (isset($_POST['marca'])) {
            $veiculo['marca'] = $_POST['marca'];
        } else {
            $veiculo['marca'] = '';
        }
    
        if (isset($_POST['modelo'])) {
            $veiculo['modelo'] = $_POST['modelo'];
        } else {
            $veiculo['modelo'] = '';
        }
    
        if (isset($_POST['hora_entrada'])) {
            $veiculo['hora_entrada'] = $_POST['hora_entrada'];
        } else {
            $veiculo['hora_entrada'] = '';
        }
    
        if (isset($_POST['hora_saida'])) {
            $veiculo['hora_saida'] = $_POST['hora_saida'];
        } else {
            $veiculo['hora_saida'] = '';
        }

        
        if (! $tem_erros) {
            gravar_veiculo($conexao, $veiculo);
            
            header('Location: veiculo.php');
            die();
        }

    }

    $lista_veiculos = lista_veiculos($conexao);


    $veiculo = array(
        'id' => 0,
        'placa' => (isset($_POST['placa'])) ? $_POST['placa'] : '',
        'marca' => (isset($_POST['marca'])) ? $_POST['marca'] : '',
        'modelo' => (isset($_POST['modelo'])) ? $_POST['modelo'] : '',
        'hora_entrada' => (isset($_POST['hora_entrada'])) ? $_POST['hora_entrada'] : '',
        'hora_saida' => (isset($_POST['hora_saida'])) ? $_POST['hora_saida'] : ''
    );

    include "template.php";