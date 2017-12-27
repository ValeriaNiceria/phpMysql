<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gerenciador de tarefas</h1>

    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label> 
                Tarefa:
                <input type="text" name="nome" class="texto">
            </label>
            <input type="submit" value="Cadastrar" class="btn">
        </fieldset>
    </form>

    <?php

        if(isset($_GET['nome'])){
            $_SESSION['lista_tarefas'][] =  $_GET['nome'];
        }

        $lista_tarefas = array();
        
        if(isset($_SESSION['lista_tarefas'])){
            $lista_tarefas =  $_SESSION['lista_tarefas'];
        }

    ?> 

    <table>
        <tr>
            <th>Tarefas</th>
        </tr>

        <?php foreach($lista_tarefas as $tarefa) : ?>
        
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>
</body>
</html>