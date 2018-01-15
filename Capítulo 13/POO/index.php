<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atributos e Métodos</title>
</head>
<body>
    
<?php

include "Carro.php";

$carro = new carro();

$carro->setModelo('Gol');
$carro->setCor('Verde');
$carro->setAno('2010');

var_dump($carro->info());

?>
    
</body>
</html>
