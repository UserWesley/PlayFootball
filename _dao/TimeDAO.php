<?php

//Esta classe representa a entidade time com o relacionamento de banco de dados
class TimeDAO extends model{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Função cadastrar Time no campeonato
    public function cadastrar(Time $time) {
        
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $this->banco->prepare("INSERT INTO time (nome,torcida,vitoria,ponto,derrota,empate,
 dinheiro,pontosFeitos,pontosSofridos,grupo,patrocinio, campeonato)
VALUES(:nome,:torcida,:vitoria,:ponto,:derrota,:empate,:dinheiro,:pontosFeitos,:pontosSofridos,:grupo
,:patrocinio,:campeonato)");
                        
            $sql->bindValue(":nome", $time->getNome());
            $sql->bindValue(":torcida", $time->getTorcida());
            $sql->bindValue(":vitoria", $time->getVitoria());
            $sql->bindValue(":ponto", $time->getPonto());
            $sql->bindValue(":derrota", $time->getDerrota());
            $sql->bindValue(":empate", $time->getEmpate());
            $sql->bindValue(":dinheiro", $time->getDinheiro());
            $sql->bindValue(":pontosFeitos", $time->getPontosFeitos());
            $sql->bindValue(":pontosSofridos", $time->getPontosSofridos());
            $sql->bindValue(":grupo", $time->getGrupo());
            $sql->bindValue(":patrocinio", $time->getPatrocinio());          
            $sql->bindValue(":campeonato", $time->getCampeonato());
            
            $sql->execute();
            return true;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();   
        }   
    }
    
    //Esta funçã busca e retorna o ultimo id de um time cadastro no campeonato
    public function idUltimoTimeRegistrado(Time $time){
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $this->banco->prepare("SELECT id FROM time WHERE nome =:nome and campeonato =:campeonato ");
        $sql->bindValue(":nome", $time->getNome());
        $sql->bindValue(":campeonato", $time->getCampeonato());
        $sql->execute();
        
        $dado = $sql->fetch();
        $ultimoId= $dado['id'];
        return $ultimoId;
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }   
    }
    
}