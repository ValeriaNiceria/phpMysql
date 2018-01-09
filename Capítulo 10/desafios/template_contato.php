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


    <h2>Anexos</h2>
    <!--lista de anexos-->

    <!--formulário para um novo anexo-->
    
</body>
</html>