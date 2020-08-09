<?php
    //arquivo de conexão ao banco de dados
    $con = "mysql:dbname=projeto-resevas;host=localhost";
    $user = "root";
    $pass = "";

    try{
        $pdo = new PDO($con, $user, $pass);        
    }
    catch(PDOExeception $e){
        echo "ERRO: ".$e->getMessage();
    }
?>