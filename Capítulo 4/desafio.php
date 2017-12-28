<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio - Lista de contatos</title>
</head>
<body>
    <!--
         Usando os mesmos conceitos que vimos até agora, monte uma lista de contatos
        na qual devem ser cadastrados o nome, o telefone e o e-mail de cada contato.
        Continue usando as sessões para manter os dados.
    -->

    <h1>Gerenciador de contatos</h1>

    <form>
        <fieldset>
            <legend>Novo contato:</legend>

            <label for="nome">Nome</label>
            <input type="text" name="nome">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone">

            <label for="email">E-mail</label>
            <input type="email" name="email">

            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <?php

        if (isset($_SESSION['lista_contatos'])) {
            $lista_contatos = $_SESSION['lista_contatos'];
        } else {
            $lista_contatos = array();
        }
        
        if(isset($_GET['nome']) && $_GET['nome'] != ''){
            $contato = array();

            $contato['nome'] = $_GET['nome'];

            if(isset($_GET['telefone'])){
                $contato['telefone'] = $_GET['telefone'];
            }else{
                $contato['telefone'] = '';
            }

            if(isset($_GET['email'])){
                $contato['email'] = $_GET['email'];
            }else{
                $contato['email'] = '';
            }

            $_SESSION['lista_contatos'][] = $contato;
        }
        
    ?> 

    <br>
    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
        <?php foreach ($lista_contatos as $contato) : ?>
            <tr>
                <td><?php echo $contato['nome']; ?></td>
                <td><?php echo $contato['telefone']; ?></td>
                <td><?php echo $contato['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table> 
   
</body>
</html>