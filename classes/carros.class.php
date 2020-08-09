<?php
class Carros{
    //varaiavel que armazena a conexao a o bd
    private $pdo;

    //função construtora
    public function __construct($pdo){     
        $this->pdo = $pdo;
    }

    //função que retorna a lista da tabela carros
    public function getCarro(){
        $array = array();
        $sql = "SELECT * FROM carros";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
           
        }

        return $array;
    }
}

?>