<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estacionamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gerenciador de estacionamento</h1>
    <form>
        <fieldset>
            <legend>Novo veículo</legend>
            <label>
                Placa:
                <input type="text" name="placa"/>
            </label>
            <label>
                Marca:
                <input type="text" name="marca"/>
            </label>
            <label>
                Modelo:
                <input type="text" name="modelo"/>
            </label>
            <fieldset>
                <legend>Horário:</legend>
                <label>
                    Hora entrada:
                    <input type="time" name="hora_entrada"/>
                </label>
                <label>
                    Hora saída:
                    <input type="time" name="hora_saida"/>
                </label>
            </fieldset>

            <input type="submit" value="Cadastrar">
        
        </fieldset>
    </form>


    <table>
        <tr>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Hora entrada</th>
            <th>Hora saída</th>
        </tr>

       <?php if(isset($lista_veiculos) && is_array($lista_veiculos) && sizeof($lista_veiculos) > 0) : ?>
            <?php foreach($lista_veiculos as $veiculo) : ?>
            <tr>
                <td><?php echo isset($veiculo['placa']) ? $veiculo['placa'] : ''; ?></td>
                <td><?php echo isset($veiculo['marca']) ? $veiculo['marca'] : ''; ?></td>
                <td><?php echo isset($veiculo['modelo']) ? $veiculo['modelo'] : ''; ?></td>
                <td><?php echo isset($veiculo['hora_entrada']) ? $veiculo['hora_entrada'] : ''; ?></td>
                <td><?php echo isset($veiculo['hora_saida']) ? $veiculo['hora_saida'] : ''; ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>

</body>
</html>