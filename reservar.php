<?php
//puxando arquivos externos
require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

//instanciando as classes necessárias
$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

//verificando se a url é válida
if(!empty($_POST['carro'])){
    $carro = addslashes($_POST['carro']);
    $data_inicio = explode('/', addslashes($_POST['data_inicio']));
    $data_fim = explode('/', addslashes($_POST['data_fim']));
    $pessoa = addslashes($_POST['pessoa']);

    //transformando as datas no formato internacional
    $data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
    $data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];

    //verificando se está disponivel para reserva
    if($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)){

        //efetuando a reserva
        $reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);

        //redirecionando para pg inicial apos exectar a reserva
        header("Location: index.php");
        exit;
    }
    else{
        //notificando caso não esteja disponivel para reserva
        echo "esse veículo ja está reservado neste periodo.";
    }
}
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
                //busca na classe carros e mostra no formulario
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