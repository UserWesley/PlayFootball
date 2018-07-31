<?php

//Classe que representa a entidade jogo com relação com o banco de dados
class JogoDAO extends model{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Função para cadastrar os jogos do campeonato
    public function cadastrar(Jogo $jogo) {
        
        //echo $jogo->getTimeVisitante();
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
    public function buscarJogoRodada($grupo, $rodada){
        ini_set('display_errors',1);
        ini_set('display_startup_erros',1);
        error_reporting(E_ALL);
        try{
            

            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $this->banco->prepare("SELECT time1.nome, jogo.pontosFeitoTimeCasa, time2.nome,
jogo.pontosFeitoTimeVisitante 
FROM jogo,time as time1, time as time2
WHERE jogo.grupo =:grupo and 
jogo.campeonato =:campeonato and jogo.rodada =:rodada and time1.id = jogo.timeCasa and time2.id = jogo.timeVisitante ");
            $sql->bindValue(":grupo", $grupo);
            $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
            $sql->bindValue(":rodada", $rodada);
            $sql->execute();
            
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $times[]=$row->timecasa.nome;
                $times[]=$row->jogo.pontosfeitotimecasa;
                $times[]=$row->timevisitante.nome;
                $times[]=$row->jogo.pontosFeitotimevisitante;
            }
            
            return $times;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
    }
}
