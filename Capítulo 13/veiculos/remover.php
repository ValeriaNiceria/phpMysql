<?php

include "config.php";
include "banco.php";
include "classes/Veiculos.php";

$veiculos = new Veiculos($mysqli);

$veiculos->remover_veiculo($_GET['id']);

header('Location: veiculos.php');
die();