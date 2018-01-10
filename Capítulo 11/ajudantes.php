<?php

function traduz_prioridade($codigo) {
    $prioridade = '';
    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Média';
            break;
        case 3:
            $prioridade = 'Alta';
            break;
    }
    return $prioridade;
}


function traduz_data_para_banco($data) {
    if ($data == "") {
        return "";
    }

    $dados = explode("/", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_mysql;
}


function traduz_data_para_exibir($data) {
    if ($data == "" || $data == "0000-00-00" ) {
        return "";
    }

    $dados = explode("-",$data);

    if (count($dados) != 3) {
        return false;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}


function traduz_concluida ($concluida) {
    if ($concluida == 1) {
        return 'Sim';
    }

    return 'Não';
}


function tem_post() { //Validando o nome da tarefa
    if(count($_POST) > 0) {
        return true;
    } 
    return false;
}


function validar_data($data) { //Validando a data digitada
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/'; //Expressão regular

    $resultado = preg_match($padrao, $data);

    if(! $resultado) {
        return false;
    }

    $dados = explode('/', $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}


function tratar_anexo($anexo) {
    $padrao = '/^.+(\.pdf$|\.zip$)$/';

    $resultado = preg_match($padrao, $anexo['name']);

    if (! $resultado) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");

    return true;
}


function enviar_email($tarefa, $anexos = array()) {
    //Acessar o sistema de e-mails;
    //Fazer a autenticação com usuário e senha;
    //Usar a opção para escrever um e-mail;
    //Digitar o e-mail do destinatário;
    //Digitar o assunto do e-mail;
    //Escrever o corpo do e-mail;
    $corpo = preparar_corpo_email($tarefa, $anexos);
    //Adicionar os anexos quando necessário;
    //Usar a opção de enviar o e-mail.
}


function preparar_corpo_email($tarefa, $anexos) {
    //Aqui vamos pegar o conteúdo processado do template_email.php

    //Falar para o PHP que não é para enviar o processamento para o navegador:
    ob_start();

    //Incluir o arquivo template_email.php:
    include "template_email.php";

    //Guardar o conteúdo do arquivo em uma variável:
    $corpo = ob_get_contents();

    //Falar para o PHP que ele pode voltar a mandar conteúdos para o navegador:
    ob_end_clean();

    return $corpo;
}