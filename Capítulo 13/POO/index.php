<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Métodos Mágicos</title>
</head>
<body>
    
<?php

include "Endereco.php";

//Instanciando a Classe Endereco
$endereco = new Endereco("Av.Padre Pedro Pinto", "890", "Venda Nova");

print_r($endereco->exibirEndereco());

echo "<br>";

//Usando o toString
echo $endereco;

echo "<br>";

//Destruíndo a variável especificada
unset($endereco);

echo $endereco; //-- Notice: Undefined variable: endereco 

?>
    
</body>
</html>
