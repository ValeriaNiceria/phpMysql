<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de tarefas</title>
    <link rel="stylesheet" href="tarefas.css"/>
</head>
<body>
    <h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
    <p>
        <a href="tarefas.php">Voltar para a lista de tarefas</a>.
    </p>

    <p>
        <strong>Concluída:</strong>
        <?php echo traduz_concluida($tarefa['concluida']); ?>
    </p>

    <p>
        <strong>Descrição:</strong>
        <?php echo nl2br($tarefa['descricao']); ?>
    </p>

    <p>
        <strong>Prazo:</strong>
        <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
    </p>

    <p>
        <strong>Prioridade:</strong>
        <?php echo traduz_prioridade($tarefa['prioridade']); ?>
    </p>

    <h2>Anexos</h2>
    <!--lista de anexos-->
        <?php if (count($tarefas->anexos)) : ?>
            <table>
                <tr>
                    <th>Arquivo</th>
                    <th>Opções</th>
                </tr>

            <?php foreach ($tarefas->anexos as $anexo) : ?>
                <tr>
                    <td>
                        <?php echo $anexo['nome']; ?>
                    </td>

                    <td>
                        <a href="anexos/<?php echo $anexo['arquivo']; ?>">
                        Download    
                        </a>
                    </td>
            <?php endforeach;?>

            </table>

        <?php else : ?>
            <p>Não há anexos para esta tarefa.</p>
        <?php endif; ?>

    <!--formulário para um novo anexo-->
    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo anexo</legend>

            <input type="hidden" name="tarefa_id" value="<?php echo $tarefas->tarefa['id']; ?>" />

            <label>
                <?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
                    <span class="erro">
                        <?php echo $erros_validacao['anexo']; ?>
                    </span>
                <?php endif; ?>

                <input type="file" name="anexo" />
            </label>
            <input type="submit" value="Cadastrar" />
        </fieldset>
    </form>

</body>
</html>