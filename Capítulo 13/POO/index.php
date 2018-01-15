<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criando uma classe</title>
</head>
<body>
    
<?php

include "Pessoa.php";

$pessoa = new Pessoa();

$pessoa->nome = 'Maria';

echo $pessoa->falar();

?>
    
</body>
</html>
