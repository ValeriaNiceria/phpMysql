    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Descrição</th>
            <th>Data Nascimento</th>
            <th>Contato Favorito</th>
            <th>Opções</th>
        </tr>

        <?php if(isset($lista_contatos) && is_array($lista_contatos) && sizeof($lista_contatos) > 0) : ?>
            <?php foreach($lista_contatos as $contato) : ?>
                <tr>
                    <td><?php echo isset($contato['nome']) ? $contato['nome'] : ''; ?></td>
                    <td><?php echo isset($contato['telefone']) ? $contato['telefone'] : ''; ?></td>
                    <td><?php echo isset($contato['email']) ? $contato['email'] : ''; ?></td>
                    <td><?php echo isset($contato['descricao']) ? $contato['descricao'] : '' ?></td>
                    <td>
                        <?php 
                            echo traduz_data_para_exibir($contato['dataNascimento']);
                        ?>
                    
                    </td>
                    <td>
                        <?php 
                            echo traduz_favorito($contato['favorito']); 
                        ?>
                    </td>
                    <td>
                        <a href="editar.php?id=<?php echo $contato['id']; ?>">
                            Editar
                        </a>

                        <a href="remover.php?id=<?php echo $contato['id']?>">
                            Remover
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    
</body>
</html>