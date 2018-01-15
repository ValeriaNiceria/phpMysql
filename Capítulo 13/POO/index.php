<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Métodos Estáticos</title>
</head>
<body>
    
<?php

include "Documento.php";

$cpf = new Documento();
$cpf->setNumero("86471612540");

var_dump($cpf->getNumero());

/*
var_dump(Documento::validarCPF("09098776754"));
*/

?>
    
</body>
</html>
