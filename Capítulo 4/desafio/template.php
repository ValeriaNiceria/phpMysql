<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Desafio - Lista de contatos</title>
</head>
<body>
    <!--
         Usando os mesmos conceitos que vimos até agora, monte uma lista de contatos
        na qual devem ser cadastrados o nome, o telefone e o e-mail de cada contato.
        Continue usando as sessões para manter os dados.
    -->

    <h1>Gerenciador de contatos</h1>

    <form>
        <fieldset>
            <legend>Novo Contato</legend>
            <label>
                Nome:
                <input type="text" name="nome"/>
            </label>
            <label>
                Telefone:
                <input type="text" name="telefone"/> 
            </label>
            <label>
                Email (Opcional):
                <input type="text" name="email"/>
            </label>
            <input type="submit" value="Cadastrar"/>
        </fieldset>
    </form>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>

        <?php if(isset($lista_contato) && is_array($lista_contato) && sizeof($lista_contato) > 0) : ?>
            <?php foreach($lista_contato as $contato) : ?>
                <tr>
                    <td><?php echo isset($contato['nome']) ? $contato['nome'] : ''; ?></td>
                    <td><?php echo isset($contato['telefone']) ? $contato['telefone'] : ''; ?></td>
                    <td><?php echo isset($contato['email']) ? $contato['email'] : ''; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    
</body>
</html>