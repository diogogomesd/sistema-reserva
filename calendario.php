<?php
$data = $_GET['ano'].'-'.$_GET['mes'];
$dia1 = date('w', strtotime($data));
$dias = date('t', strtotime($data));
$linhas = ceil(($dia1 + $dias)/7);
$dia1 = -$dia1;
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
$data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas*7)-1)).' days', strtotime($data)));

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
</head>
<body>
    <table border="1" width="100%">
        <tr>
            <th>DOM</th>
            <th>SEG</th>
            <th>TER</th>
            <th>QUA</th>
            <th>QUI</th>
            <th>SEX</th>
            <th>SAB</th>
        </tr>
        <?php for($l=0; $l<$linhas; $l++):?>
            <tr>
                <?php for($q=0; $q<7; $q++):?>
                <?php
                $t = strtotime(($q + ($l*7)).' days', strtotime($data_inicio)); 
                $w = date('Y-m-d', $t );    
                    
                ?>
                <td><?php 
                     echo date('d', $t)."</br></br>"; 
                     $w = strtotime($w);
                    foreach($lista as $item){
                        $dr_inicio = strtotime($item['data_inicio']);
                        $dr_fim = strtotime($item['data_fim']);
                       
                        if($w >= $dr_inicio && $w <= $dr_fim){
                            echo $item['pessoa']."(".$item['id_carro'].")</br>";
                            
                        }
                    }
               
                ?></td>
                <?php endfor;?>
            </tr>
        <?php endfor;?>
    </table>
    
</body>
</html>