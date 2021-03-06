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
                <input type="text" name="nome"/>
            </label>
            <label>
                Descrição (Opcional):
                <textarea name="descricao"></textarea>
            </label>
            <label>
                Prazo (Opcional):
                <input type="text" name="prazo"/>
            </label>
            <fieldset>
                <legend>Prioridade:</legend>
                <label>
                    <input type="radio" name="prioridade" value="baixa" checked/>
                    Baixa 
                    <input type="radio" name="prioridade" value="media"/>
                    Média 
                    <input type="radio" name="prioridade" value="alta"/>
                    Alta
                </label>
            </fieldset>
            <label>
                Tarefa concluída:
                <input type="checkbox" name="concluida" value="sim"/>
            </label>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>

    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
        </tr>

        <?php if(isset($lista_tarefas) && is_array($lista_tarefas) && sizeof($lista_tarefas) > 0) : ?>
            <?php foreach($lista_tarefas as $tarefa) : ?>
            
                <tr>
                    <td><?php echo isset($tarefa['nome']) ? $tarefa['nome'] : ''; ?></td>
                    <td><?php echo isset($tarefa['descricao']) ? $tarefa['descricao'] : ''; ?></td>
                    <td><?php echo isset($tarefa['prazo']) ? $tarefa['prazo'] : ''; ?></td>
                    <td><?php echo isset($tarefa['prioridade']) ? $tarefa['prioridade'] : ''; ?></td>
                    <td><?php echo isset($tarefa['concluida']) ? $tarefa['concluida'] : ''; ?></td>
                </tr>

            <?php endforeach; ?>
        <?php endif;?>

    </table>
</body>
</html>