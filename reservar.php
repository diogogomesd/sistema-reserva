<?php
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVA</title>
</head>
<body>
    <h1>Adicionar reserva</h1>
    <form method="POST">
        Carro:</br>
        <select name="carro">
            <?php
                $lista = $carros->getCarro();
                foreach($lista as $carro):
                ?>
                    <option value="<?php echo $carro['id']; ?>"><?php echo $carro['modelo']; ?></option>
            
            <?php
                endforeach;
            ?>
        </select></br>
        Data_inicio:</br>
        <input type="text" name="data_inicio" /></br>
        Data_fim:</br>
        <input type="text" name="data_fim" /></br>
        Nome da Pessoa:</br>
        <input type="text" name="pessoa" /></br>
        <input type="submit" value="Reservar">
    </form>
</body>
</html>