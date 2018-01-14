<?php
//Evitando o acesso direto
defined('BASEPATH') OR exit('No direct script acess allowed');


class Exemplo1_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function salvar(){
        echo 'Executado o método salvar do model!';
    }

}

?>