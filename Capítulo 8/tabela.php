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
                    <td> <!--O campo com os links para editar e remover-->
                        <a href="editar.php?id=<?php echo $tarefa['id']; ?>">
                            Editar    
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif;?>
        
    </table>

</body>
</html>