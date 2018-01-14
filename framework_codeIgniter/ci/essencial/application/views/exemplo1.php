<?php
defined('BASEPATH') OR exit('No direct script acess allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Olá Mundo!</title>
    <style>
    body{
        font-family: sans-serif;
    }

    h1{
        color: #090;
    }
    </style>
</head>
<body>
    <h1><?php echo isset($titulo) ? $titulo : 'Não foi informado o título!'; ?></h1>
    <p><?php echo isset($conteudo) ? $conteudo : 'Não foi informado o conteúdo!'; ?></p>
</body>
</html>