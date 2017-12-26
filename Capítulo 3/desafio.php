<?php
    /*
    Faça uma página que exiba a hora e a frase “Bom dia”, “Boa tarde” ou “Boa
    noite”, de acordo com a hora. Use a condicional if e a função date().
    */

    $hora = date('H');

    if($hora >= 18){
        $msg = 'Boa noite!';
    }elseif($hora >=12){
        $msg = 'Boa tarde!';
    }elseif($hora >= 6){
        $msg = 'Bom dia!';
    }else{
        $msg = 'Boa madrugada!';
    }

    echo date('H:i:s') . " " . $msg;


    /*
    - Faça com que o calendário exiba o dia atual em negrito, usando a função
    date().
    - Exiba os domingos em vermelho e os sábados em negrito.
    - Faça o calendário começar em um dia que não seja um domingo.
    */ 

    function linha($semana){
        echo "<tr>";
            for($i = 0; $i <= 6; $i++){
                if(isset($semana[$i])){
                    if ($i == 0){
                        echo "<td><font color='red'>{$semana[$i]}</font></td>";
                    }elseif($i == 6){
                        echo "<td><strong>{$semana[$i]}</strong></td>";
                    }else{
                        echo "<td>{$semana[$i]}</td>";
                    }
                    
                }else{
                    echo "<td></td>";
                }
            }
        echo "</tr>";
    }

    function calendario(){
        $dia = 1;

        $semana = array("");

        $hj = date('d');
        
        while($dia <= 31){
           if($dia == $hj){
                array_push($semana, "<strong>{$dia}</strong>");
           }else{
                array_push($semana, $dia);
           }

            if(count($semana) == 7){
                linha($semana);
                $semana = array();  
            }
            $dia++;
        }
        linha($semana);
    }
?> 

<table border="1">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
    </tr>
    <?php
        calendario();
    ?> 
</table>


