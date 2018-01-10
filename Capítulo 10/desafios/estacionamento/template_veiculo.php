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

    <!-- Formulário para um novo anexo -->
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo anexo</legend>

            <input type="hidden" name="veiculo_id" value="<?php echo $veiculo['id']; ?>"/>

            <label>

                <?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
                    <span class="erros">
                        <?php echo $erros_validacao['anexo']; ?>
                    </span>
                <?php endif; ?>

                <input type="file" name="anexo" />

            </label>

            <label>
                Horário:

                <input type="radio" name="tipo" value="0" checked/>
                Entrada

                <input type="radio" name="tipo" value="1" />
                Saída
            </label>

            <input type="submit" value="Cadastrar" />

        </fieldset>
    </form>
</body>
</html>