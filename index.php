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
<form method="GET">
  <select name="ano">
    <?php $ano = date('Y'); for($q=2019; $q <= $ano; $q++):?>
      <option><?php echo $q;?></option>
    <?php endfor;?>  
  </select>
  <select name="mes">
      <option>01</option>
      <option>02</option>
      <option>03</option>
      <option>04</option>
      <option>05</option>
      <option>06</option>
      <option>07</option>
      <option>08</option>
      <option>09</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>  
  </select>
  <input type="submit" value="Selecionar">
</form>


<?php

if(empty($_GET['ano'])){
  exit;
}
//pega as informações na url e transfere para a classe de reservas
$data = $_GET['ano'].'-'.$_GET['mes'];
$dia1 = date('w', strtotime($data));
$dias = date('t', strtotime($data));
$linhas = ceil(($dia1 + $dias)/7);
$dia1 = -$dia1;
$data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
$data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas*7)-1)).' days', strtotime($data)));

$lista = $reservas->getReserva($data_inicio, $data_fim);

?>
<hr/>
<?php
      require 'calendario.php';
?>