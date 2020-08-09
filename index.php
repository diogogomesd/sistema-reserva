<?php
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);
?>
<h1>RESERVAS</h1></br>
<a href="reservar.php">Adicionar Reserva</a>
</br></br>
<?php
$lista = $reservas->getReserva();
    foreach($lista as $item){
        $data1 = date('d/m/y', strtotime($item['data_inicio']));
        $data2 = date('d/m/y', strtotime($item['data_fim']));
      echo $item['pessoa'].' reservou o carro '.$item['id_carro']. ' entre '.$data1. ' e '.$data2. '</br>';
    }
?>