<table>
    <tr>
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Hora entrada</th>
        <th>Hora saída</th>
        <th>Opções</th>
    </tr>

    <?php if(isset($lista_veiculos) && is_array($lista_veiculos) && sizeof($lista_veiculos) > 0) : ?>
         <?php foreach($lista_veiculos as $veiculo) : ?>
         <tr>
             <td><?php echo isset($veiculo['placa']) ? $veiculo['placa'] : ''; ?></td>
             <td><?php echo isset($veiculo['marca']) ? $veiculo['marca'] : ''; ?></td>
             <td><?php echo isset($veiculo['modelo']) ? $veiculo['modelo'] : ''; ?></td>
             <td><?php echo isset($veiculo['hora_entrada']) ? $veiculo['hora_entrada'] : ''; ?></td>
             <td><?php echo isset($veiculo['hora_saida']) ? $veiculo['hora_saida'] : ''; ?></td>
             <td>
                 <a href="editar.php?id=<?php echo $veiculo['id']; ?>">
                     Editar
                 </a>

                 <a href="remover.php?id=<?php echo $veiculo['id']; ?>">
                     Remover
                 </a>
             </td>
         </tr>
         <?php endforeach; ?>
     <?php endif; ?>

</table>

</body>
</html>