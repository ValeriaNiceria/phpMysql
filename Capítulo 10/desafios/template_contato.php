<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de contatos</title>
    <link rel="stylesheet" href="contatos.css"/>
</head>
<body>

    <h1>Contato: <?php echo $contato['nome']; ?></h1>

    <p>
        <a href="contatos.php">Voltar para lista de contatos</a>.
    </p>

    <p>
        <strong>Telefone:</strong>
        <?php echo $contato['telefone']; ?>
    </p>

    <p>
        <strong>Email:</strong>
        <?php echo $contato['email']; ?>
    </p>

    <p>
        <strong>Descrição: </strong>
        <?php echo nl2br($contato['descricao']); ?>
    </p>

    <p>
        <strong>Data de Nascimento: </strong>
        <?php echo traduz_data_para_exibir($contato['dataNascimento']); ?>
    </p>

    <p>
        <strong>Contato favorito:</strong>
        <?php echo traduz_favorito($contato['favorito']); ?>
    </p>


    <h2>Fotos</h2>
    <!--lista de fotos anexadas-->
    <?php if (count($anexos) > 0) : ?>
        <table>
            <tr>
                <th>Foto</th>
                <th>Opções</th>
            </tr>
            <?php foreach ($anexos as $anexo) : ?>
                <tr>
                    <td>
                        <img class="img_table" src="anexos/<?php echo $anexo['arquivo']; ?>">
                    </td>

                    <td>
                        <a href="anexos/<?php echo $anexo['arquivo']; ?>">Download</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        <?php else : ?>
            <p>Não há fotos anexadas para este contato.</p>
    <?php endif; ?>

    <!--formulário para um novo anexo-->
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Novo anexo</legend>
            <input type="hidden" name="contato_id" value="<?php echo $contato['id']; ?>"/>

            <label>
                <?php if ($tem_erros && isset($erros_validacao['anexo'])) :?>
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