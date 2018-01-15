<?php

class Carro
{
    private $modelo;
    private $cor;
    private $ano;

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($value)
    {
        $this->modelo = $value;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($value)
    {
        $this->cor = $value;
    }

    public function getAno():int
    {
        return $this->ano;
    }

    public function setAno($value)
    {
        $this->ano = $value;
    }

    public function info()
    {
        return array(
            "Modelo: " => $this->getModelo(),
            "Cor: " => $this->getCor(),
            "Ano: " => $this->getAno()
        );
    }
}

?>