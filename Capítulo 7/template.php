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
                    <input type="radio" name="prioridade" value="1" checked/>
                    Baixa 
                    <input type="radio" name="prioridade" value="2"/>
                    Média 
                    <input type="radio" name="prioridade" value="3"/>
                    Alta
                </label>
            </fieldset>
            <label>
                Tarefa concluída:
                <input type="checkbox" name="concluida" value="1"/>
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
                    <td>
                        <?php 
                            echo traduz_data_para_exibir($tarefa['prazo']);
                        ?>
                    </td>
                    <td>
                        <?php 
                           echo traduz_prioridade($tarefa['prioridade']);
                        ?>
                    </td>
                    <td>
                        <?php 
                            echo traduz_concluida($tarefa['concluida']);
                        ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php endif;?>

    </table>
</body>
</html>