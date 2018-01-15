<?php

class Pessoa{
    public $nome = "Maria"; //Pode ser acessada pela classe atual e todas as outras classes
    protected $idade = 29; //Pode ser acessada pela classe atual e todas as suas sub-classes
    private $senha = "!09$@"; //Pode ser acessada somente pela classe atual


    public function verDados(){
        return $this->nome . " - " . $this->idade . " - " . $this->senha . " - ";
    }
    
}

?>