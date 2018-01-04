<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gerenciador de tarefas</h1>

    <?php
        include('formulario.php');
    ?>

    <?php
        if($exibir_tabela) :
            include('tabela.php');
        endif;   
    ?> 
</body>
</html>