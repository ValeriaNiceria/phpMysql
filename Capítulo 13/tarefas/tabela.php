<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    
    <table>
        <tr>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Concluída</th>
            <th>Opções</th> <!--A nova coluna Opções-->
        </tr>

        <?php if(isset($tarefas->tarefas) && is_array($tarefas->tarefas) && sizeof($tarefas->tarefas) > 0) : ?>
            <?php foreach($tarefas->tarefas as $tarefa) : ?>
            
                <tr>
                    <td>
                        <a href="tarefa.php?id=<?php echo $tarefa['id']; ?>">
                            <?php echo isset($tarefa['nome']) ? $tarefa['nome'] : ''; ?>
                        </a>

                    </td>
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
                    <td> <!--O campo com os links para editar e remover-->
                        <a href="editar.php?id=<?php echo $tarefa['id']; ?>" class="btn">
                            Editar    
                        </a>

                        <a href="remover.php?id=<?php echo $tarefa['id']; ?>" class="btn">
                            Remover
                        </a>

                        <a href="duplicar.php?id=<?php echo $tarefa['id']; ?>" class="btn">
                            Duplicar tarefa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
        
    </table>

</body>
</html>