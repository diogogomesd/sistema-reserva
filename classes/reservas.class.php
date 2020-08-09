<?php
class Reservas{

    //variavel que guarda conexao ao bd
    private $pdo;

    //função construtora
    public function __construct($pdo){
        $this->pdo = $pdo;

    }

    //função que busca as reservas para exibir
    public function getReserva($data_inicio, $data_fim){
        $array = array();
        $sql = "SELECT * FROM resevas WHERE (NOT (data_inicio > :data_fim OR data_fim < :data_inicio))";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':data_inicio', $data_inicio);
        $sql->bindValue(':data_fim', $data_fim);
        $sql->execute();
        
        if($sql->rowCount() > 0 ){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    //função que verifica se o veiculo ja não está reservado no periodo
    public function verificarDisponibilidade($carro, $data_inicio, $data_fim){
        $sql = "SELECT
         * 
         FROM resevas 
         WHERE
          id_carro = :carro AND 
          (NOT (data_inicio > :data_fim OR data_fim < :data_inicio))";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':carro', $carro);
        $sql->bindValue('data_inicio', $data_inicio);
        $sql->bindValue(':data_fim', $data_fim);       
        $sql->execute();

        if($sql->rowCount() > 0){
            return false;
        }
        else{
            return true;
        }
    }

    //função que adiciona reserva ao banco
    public function reservar($carro, $data_inicio, $data_fim, $pessoa){
        $sql = "INSERT INTO resevas (id_carro, data_inicio, data_fim, pessoa) VALUES (:carro, :data_inicio, :data_fim, :pessoa)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':carro', $carro);
        $sql->bindValue(':data_inicio', $data_inicio);
        $sql->bindValue(':data_fim', $data_fim);
        $sql->bindValue('pessoa', $pessoa);
        $sql->execute();
    }
}
?>