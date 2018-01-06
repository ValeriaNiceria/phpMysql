<?php

include "banco.php";

apagar_concluida($conexao);

header('Location: tarefas.php');
die();