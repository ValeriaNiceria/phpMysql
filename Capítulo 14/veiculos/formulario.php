<form method="POST">

    <input type="hidden" name="id" value="<?php echo $veiculo['id']; ?>"/>

    <fieldset>
        <legend>Novo veículo</legend>
        <label>
            Placa:
            <?php if ($tem_erros && isset($erros_validacao['placa'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['placa']; ?>
                </span>
            <?php endif;?>

            <input type="text" name="placa" value="<?php echo htmlspecialchars($veiculo['placa']); ?>"/>
        </label>
        <label>
            Marca:
            <input type="text" name="marca" value="<?php echo htmlspecialchars($veiculo['marca']); ?>"/>
        </label>
        <label>
            Modelo:
            <input type="text" name="modelo" value="<?php echo htmlspecialchars($veiculo['modelo']); ?>"/>
        </label>
        <fieldset>
            <legend>Horário:</legend>
            <label>
                Hora entrada:
                <input type="time" name="hora_entrada" value="<?php echo $veiculo['hora_entrada']; ?>"/>
            </label>
            <label>
                Hora saída:
                <input type="time" name="hora_saida" value="<?php echo $veiculo['hora_saida']; ?>"/>
            </label>
        </fieldset>
        <input type="submit" value="<?php echo ($veiculo['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
    
    </fieldset>
</form>