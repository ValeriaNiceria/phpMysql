<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de veículos</title>
    <link rel="stylesheet" href="veiculos.css"/>
</head>
<body>
    <h1>Placa: <?php echo $veiculo['placa']; ?></h1>

    <p>
        <a href="veiculos.php">Voltar para lista de tarefas</a>.
    </p>

    <p>
        <strong>Marca:</strong>
        <?php echo $veiculo['marca']; ?>
    </p>

    <p>
        <strong>Modelo:</strong>
        <?php echo $veiculo['modelo']; ?>
    </p>
    

    <p>
        <strong>Hora entrada:</strong>
        <?php echo $veiculo['hora_entrada']; ?>
    </p>

    <p>
        <strong>Hora saída:</strong>
        <?php echo $veiculo['hora_saida']; ?>
    </p>
</body>
</html>