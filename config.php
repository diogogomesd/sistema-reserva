<?php
    //arquivo de conexão ao banco de dados
    $con = "mysql:dbname=projeto-reservas;host=localhost";
    $user = "root";
    $pass = "";
    try{
        $pdo = new PDO($con, $user, $pass);
        echo "conexao ok";
    }
    catch(PDOExeception $e){
        echo "ERRO: ".$e->getMessage();
    }
?>