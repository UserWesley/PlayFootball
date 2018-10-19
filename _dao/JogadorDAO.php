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
            
            $sql = $this->banco->prepare("INSERT INTO jogador (nome, sobrenome,idade,peso,altura,posicao,agilidade,chute,
forca,lancamento,marcacao,pegar,resistencia,salto,tackle,velocidade,time,campeonato)
VALUES(:nome,:sobrenome,:idade,:peso,:altura,:posicao,:agilidade,:chute,:forca,
:lancamento,:marcacao,:pegar,:resistencia,:salto,:tackle,:velocidade,:time,:campeonato)");
            
            $sql->bindValue(":nome", $jogador->getNome());
            $sql->bindValue(":sobrenome", $jogador->getSobrenome());
            $sql->bindValue(":idade", $jogador->getIdade());
            $sql->bindValue(":peso", $jogador->getPeso());
            $sql->bindValue(":altura", $jogador->getAltura());
            $sql->bindValue(":posicao", $jogador->getPosicao());
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
    
    //Consultar e retorno em um array todos jogadores de um time
    public function buscarJogadorMeuTime(){
        
        try{
            $consultaJogador = 'SELECT nome, sobrenome, idade,peso, altura, posicao,agilidade,
                chute, forca, lancamento, pegar, marcacao, resistencia, salto, tackle, velocidade
          	FROM Jogador WHERE time = ? ORDER BY posicao DESC';
            
            $preparaConsultaJogador = $this->banco->prepare($consultaJogador);
            $preparaConsultaJogador->bindValue(1, $_SESSION["idTime"]);
            $preparaConsultaJogador->execute();
            
            $result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
            
            while ($row = $preparaConsultaJogador->fetch()) {
                
                $jogadorTime[] = $row[0];
                $jogadorTime[] = $row[1];
                $jogadorTime[] = $row[2];
                $jogadorTime[] = $row[3];
                $jogadorTime[] = $row[4];
                $jogadorTime[] = $row[5];
                $jogadorTime[] = $row[6];
                $jogadorTime[] = $row[7];
                $jogadorTime[] = $row[8];
                $jogadorTime[] = $row[9];
                $jogadorTime[] = $row[10];
                $jogadorTime[] = $row[11];
                $jogadorTime[] = $row[12];
                $jogadorTime[] = $row[13];
                $jogadorTime[] = $row[14];
                $jogadorTime[] = $row[15]; 
            }
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
        return $jogadorTime;
    }
    
    //Consultar e retorno em um array todos jogadores de um time acrescentando o id
    public function buscarJogadorMeuTimeComId(){
        
        try{
            $consultaJogador = 'SELECT id,nome, sobrenome, idade,peso, altura, posicao,agilidade,
                chute, forca, lancamento, pegar, marcacao, resistencia, salto, tackle, velocidade
          	FROM Jogador WHERE time = ? ORDER BY posicao DESC';
            
            $preparaConsultaJogador = $this->banco->prepare($consultaJogador);
            $preparaConsultaJogador->bindValue(1, $_SESSION["idTime"]);
            $preparaConsultaJogador->execute();
            
            $result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
            
            while ($row = $preparaConsultaJogador->fetch()) {
                
                $jogadorTime[] = $row[0];
                $jogadorTime[] = $row[1];
                $jogadorTime[] = $row[2];
                $jogadorTime[] = $row[3];
                $jogadorTime[] = $row[4];
                $jogadorTime[] = $row[5];
                $jogadorTime[] = $row[6];
                $jogadorTime[] = $row[7];
                $jogadorTime[] = $row[8];
                $jogadorTime[] = $row[9];
                $jogadorTime[] = $row[10];
                $jogadorTime[] = $row[11];
                $jogadorTime[] = $row[12];
                $jogadorTime[] = $row[13];
                $jogadorTime[] = $row[14];
                $jogadorTime[] = $row[15];
                $jogadorTime[] = $row[16];
            }
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
        return $jogadorTime;
    }
    

    //Consultar habilidades de um jogador,e retorna sua soma do time
    public function buscarHabilidadesJogador($idJogadores){
        
        $habilidadeJogador = 0;
        $habilidadeTime = 0;
        
        //Repete para os 11 jogadores da jogada
        for($i=0;$i<=10;$i++){
            try{
                $consultaJogador = 'SELECT agilidade, forca, lancamento, pegar, marcacao, resistencia,
                                    salto, tackle, velocidade
                  	                 FROM Jogador WHERE id = ? ';
                
                $preparaConsultaJogador = $this->banco->prepare($consultaJogador);
                $preparaConsultaJogador->bindValue(1, $idJogadores[$i]);
                $preparaConsultaJogador->execute();
                
                $result = $preparaConsultaJogador->setFetchMode(PDO::FETCH_NUM);
                
                while ($row = $preparaConsultaJogador->fetch()) {
                    $habilidadeJogador = $row[0] + $row[1]+ $row[2]+ $row[3]+ $row[4]+ $row[5]+ $row[6]+ $row[7]+ $row[8];
                    
                }
            }catch(PDOException $e){
                echo "ERRO ".$e->getMessage();
            }
            $habilidadeTime = $habilidadeJogador + $habilidadeTime;
        }
            return $habilidadeTime;
    }   
}