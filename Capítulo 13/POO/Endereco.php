<?php

class Endereco{
    private $rua;
    private $numero;
    private $bairro;

    //Método Mágico (__construct)
    public function __construct($rua, $numero, $bairro)
    {
        $this->setRua($rua);
        $this->setNumero($numero);
        $this->setBairro($bairro);
    }

    public function getRua()
    {
        return $this->rua;
    }
    public function setRua($value)
    {
        $this->rua = $value;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($value)
    {
        $this->numero = $value;
    }

    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($value)
    {
        $this->bairro = $value;
    }

    //__destruct (tira o objeto da memória)
    public function __destruct()
    {
        var_dump("DESTRUIR");
    }

    public function __toString()
    {
        return $this->getRua().", ".$this->getNumero()." - ".$this->getBairro();
    }

    public function exibirEndereco()
    {
        return array(
            "Rua: " => $this->getRua(),
            "Número: " => $this->getNumero(),
            "Bairro: " => $this->getBairro()
        );
    }
}

?> 