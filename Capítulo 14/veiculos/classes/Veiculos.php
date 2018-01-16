<?php

class Veiculos
{
    public $mysqli;
    public $veiculos = array();
    public $veiculo;
    public $anexos = array();


    public function __construct($nova_conexao)
    {
        $this->mysqli = $nova_conexao;
    }

    public function lista_veiculos() {
        $sqlBusca = 'SELECT * FROM veiculos';
    
        $resultado = $this->mysqli->query($sqlBusca);
    
        $this->veiculos = array();
    
        while($veiculo = mysqli_fetch_assoc($resultado)) {
            $this->veiculos[] = $veiculo;
        }
    }


    public function gravar_veiculo($veiculo) 
    {
        $sqlGravar = "
            INSERT INTO veiculos 
            (placa, marca, modelo, hora_entrada, hora_saida)
            VALUES
            (
                '{$veiculo['placa']}',
                '{$veiculo['marca']}',
                '{$veiculo['modelo']}',
                '{$veiculo['hora_entrada']}',
                '{$veiculo['hora_saida']}'
            )
        ";
        $this->mysqli->query($sqlGravar);
    }


    public function buscar_veiculo($id) 
    {
        $sqlBusca = "SELECT * FROM veiculos WHERE id = " . $id;
    
        $resultado = $this->mysqli->query($sqlBusca);
    
        $this->veiculo = mysqli_fetch_assoc($resultado);
    }


    public function editar_veiculo($veiculo) 
    {
        $sqlEditar = "
            UPDATE veiculos SET
                placa = '{$veiculo['placa']}',
                marca = '{$veiculo['marca']}',
                modelo = '{$veiculo['modelo']}',
                hora_entrada = '{$veiculo['hora_entrada']}',
                hora_saida = '{$veiculo['hora_saida']}'
            WHERE id = {$veiculo['id']}
        ";
        $this->mysqli_query($sqlEditar);
    }

    public function remover_veiculo($id) 
    {
        $sqlRemover = "DELETE FROM veiculos WHERE id = " . $id;
    
        $this->mysqli->query($sqlRemover);
    }


    public function gravar_anexo($anexo) 
    {
        $sqlGravar = "
        INSERT INTO anexos
            (veiculo_id, nome, arquivo, tipo)
        VALUES(
            {$anexo['veiculo_id']},
            '{$anexo['nome']}',
            '{$anexo['arquivo']}',
            '{$anexo['tipo']}'
        )
        ";
        $this->mysqli->query($sqlGravar);
    }


    public function buscar_anexos($veiculo_id) {
        $sql = "SELECT * FROM anexos WHERE veiculo_id = {$veiculo_id}";
    
        $resultado = $this->mysqli->query($sql);
    
        $this->anexos = array();
    
        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $this->anexos[] = $anexo;
        }
    }
    
}