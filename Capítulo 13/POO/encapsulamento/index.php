<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Encapsulamento</title>
</head>
<body>

<?php

include "Pessoa.php";

$pessoa = new Pessoa();

echo $pessoa->verDados();

echo "<br>";

echo $pessoa->nome;
echo $pessoa->idade; //Não vai conseguir acessar
echo $pessoa->senha; //Não vai conseguir acessar



?>
    
</body>
</html>