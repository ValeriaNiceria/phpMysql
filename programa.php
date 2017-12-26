<?php

    echo "Hoje é dia " . date('d/m/Y'); // --> 26/12/2017
    echo " agora são " . date('H:i:s'); // -->  19:28:23

    echo "<br>";

    echo "Hoje é dia " . date('d/m/y'); // -->  26/12/17
    echo " agora são " . date('h:i:s'); // --> 07:28:23

    echo "<br>";


    $dia = date('w');

    switch($dia){
        case 0:
            echo "Domingo!";
            break;
        case 1: 
            echo "Segunda!";
            break;
        case 2:
            echo "Terça!";
            break;
        case 3:
            echo "Quarta!";
            break;
        case 4:
            echo "Quinta!";
            break;
        case 5:
            echo "Sexta!";
            break;
        case 6:
            echo "Sábado!";
            break;
        default:
            echo "Erro: Dia da semana não localizado!";
    }


    echo "<br>";

    echo "Faltam " . (6 - $dia) . " dias para o sábado!";

    echo "<br>";

    $mesArray = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

    $mes = date('m');

    echo $mesArray[--$mes];



?> 