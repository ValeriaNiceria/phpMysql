<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Desafio - Lista de contatos</title>
</head>
<body>

    <h1>Gerenciador de contatos</h1>

<?php 
    include "formulario.php";
?>

<?php
    if($exibir_tabela) :
        include "tabela.php";
    endif;

?>
