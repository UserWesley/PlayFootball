<?php

//Classe que representa a entidade jogo com relação com o banco de dados
class JogoDAO extends model{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Função para cadastrar os jogos do campeonato
    public function cadastrar(Jogo $jogo) {
        
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $this->banco->prepare("INSERT INTO jogo (timeCasa,timeVisitante
       ,campeonato,rodada,tipo)VALUES(:timeCasa,:timeVisitante,
       :campeonato,:rodada,:tipo)");
            
            $sql->bindValue(":timeCasa", $jogo->getTimeCasa());
            $sql->bindValue(":timeVisitante", $jogo->getTimeVisitante());
            $sql->bindValue(":campeonato", $jogo->getCampeonato());
            $sql->bindValue(":rodada", $jogo->getRodada());
            $sql->bindValue(":tipo", $jogo->getTipo());
            
            $sql->execute();
            return true;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
    }
    
    //Buscar jogos de rodadas do campeonato e retorna em uma array
    public function buscarJogoRodada($rodada){
        
        try{
            
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $this->banco->prepare(" SELECT timeCasa.nome as timecasa1, jogo.pontosFeitoTimeCasa, timeVisitante.nome as timeVisitante1, jogo.pontosFeitoTimeVisitante 
FROM jogo, time as timeCasa, time as TimeVisitante WHERE jogo.campeonato = :campeonato and rodada = :rodada and jogo.timeCasa = timeCasa.id and jogo.TimeVisitante = TimeVisitante.id");
            $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
            $sql->bindValue(":rodada", $rodada);
            $sql->execute();
            
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $times[]=$row->timecasa1;
                $times[]=$row->pontosfeitotimecasa;
                $times[]=$row->pontosfeitotimevisitante;
                $times[]=$row->timevisitante1;
                
            }
            return $times;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
    }
    
    //Buscar jogos de rodadas do campeonato e retorna em uma array
    public function buscarJogoRodadaArray($rodada){
        
        try{
            
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $this->banco->prepare(" SELECT timeCasa.nome as timecasa1, jogo.pontosFeitoTimeCasa, timeVisitante.nome as timeVisitante1, jogo.pontosFeitoTimeVisitante
FROM jogo, time as timeCasa, time as TimeVisitante WHERE jogo.campeonato = :campeonato and rodada = :rodada and jogo.timeCasa = timeCasa.id and jogo.TimeVisitante = TimeVisitante.id");
            $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
            $sql->bindValue(":rodada", $rodada);
            $sql->execute();
            
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $times[]=$row->timecasa1;
                $times[]=$row->timevisitante1;
                $jogo[] = $times;
                unset($times);
            }
            return $jogo;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
        
    }
}
