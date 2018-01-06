<form method="POST">

    <input type="hidden" name="id" value="<?php echo $contato['id']; ?>"/>
    
    <fieldset>
        <legend>Novo Contato</legend>
        <label>
            Nome:

            <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['nome']; ?>
                </span>
            <?php endif; ?>

            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>"/>
        </label>
        <label>
            Telefone:

            <?php if ($tem_erros && isset($erros_validacao['telefone'])) :?>
                <span class="erro">
                    <?php echo $erros_validacao['telefone']; ?>
                </span>
            <?php endif; ?>

            <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>"/> 
        </label>
        <label>
            Email (Opcional):
            <input type="text" name="email" value="<?php echo $contato['email']; ?>"/>
        </label>
        <label>
            Descrição (Opcional):
            <textarea name="descricao">
                <?php echo $contato['descricao']; ?>
            </textarea>
        </label>
        <label>
            Data de Nascimento:

            <?php if ($tem_erros && isset($erros_validacao['dataNascimento'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['dataNascimento']; ?>
                </span>
            <?php endif;?>

            <input type="text" name="dataNascimento" value="<?php echo traduz_data_para_exibir($contato['dataNascimento']); ?>"/>
        </label>
        <label>
            Contato Favorito:
            <input type="checkbox" name="favorito" value="1"
                <?php
                    echo ($contato['favorito'] == 1) ? 'checked' : '';
                ?>
            />
        </label>
        <input type="submit" value="
        <?php
            echo ($contato['id'] > 0) ? 'Atualizar' : 'Cadastrar';
        ?>"        
        />
    </fieldset>
</form>
