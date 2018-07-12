<?php

//Classe que representa entidade jogador com relação no banco de dados
class JogadorDAO extends model{

    public function __construct(){
        parent::__construct();
    }
    
    //Função cadastrar jogador no banco
    public function cadastrar(Jogador $jogador) {
        
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $this->banco->prepare("INSERT INTO jogador (nome, sobrenome,idade,peso,altura,agilidade,chute,
forca,lancamento,marcacao,pegar,resistencia,salto,tackle,velocidade,time,campeonato)
VALUES(:nome,:sobrenome,:idade,:peso,:altura,:agilidade,:chute,:forca,
:lancamento,:marcacao,:pegar,:resistencia,:salto,:tackle,:velocidade,:time,:campeonato)");
            $sql->bindValue(":nome", $jogador->getNome());
            $sql->bindValue(":sobrenome", $jogador->getSobrenome());
            $sql->bindValue(":idade", $jogador->getIdade());
            $sql->bindValue(":peso", $jogador->getPeso());
            $sql->bindValue(":altura", $jogador->getAltura());
            $sql->bindValue(":agilidade", $jogador->getAgilidade());
            $sql->bindValue(":chute", $jogador->getChute());
            $sql->bindValue(":forca", $jogador->getForca());
            $sql->bindValue(":lancamento", $jogador->getLancamento());
            $sql->bindValue(":marcacao", $jogador->getMarcacao());
            $sql->bindValue(":pegar", $jogador->getPegar());
            $sql->bindValue(":resistencia", $jogador->getResistencia());
            $sql->bindValue(":salto", $jogador->getSalto());
            $sql->bindValue(":tackle", $jogador->getTackle());
            $sql->bindValue(":velocidade", $jogador->getVelocidade());
            $sql->bindValue(":time", $jogador->getTime());
            $sql->bindValue(":campeonato", $jogador->getCampeonato());
            $sql->execute();
            return true;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
    }
    
}