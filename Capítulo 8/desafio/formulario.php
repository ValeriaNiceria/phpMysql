<form>

    <input type="hidden" name="id" value="<?php echo $contato['id']; ?>"/>
    
    <fieldset>
        <legend>Novo Contato</legend>
        <label>
            Nome:
            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>"/>
        </label>
        <label>
            Telefone:
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
