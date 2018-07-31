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
    
    //Esta função busca times no mesmo grupo de um campeonato, e os retorno em um array
    public function buscarTimeGrupo($grupo){

        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $this->banco->prepare("SELECT id FROM time WHERE grupo =:grupo and campeonato =:campeonato ");
            $sql->bindValue(":grupo", $grupo);
            $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
            $sql->execute();
            
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $times[]=$row->id;
            }

            return $times;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }   
    }
    
    //Busca todos time de um determinado campeonato e retorno em um array
    public function buscarTodosTimesCampeonato($campeonato){
        
        $sql = $this->banco->prepare("SELECT id,nome FROM time WHERE campeonato = :campeonato");
        $sql->bindValue(":campeonato", $campeonato);
        $sql->execute();
        
        while ($dado = $sql->fetch()) {
            $times[$dado['id']] = $dado['nome'];
        }
        return $times;
    }
    
    //Cadastrando usuário como dono do time
    public function atualizarTimeUsuario($usuario,$time){

        try{
            $cadastroUsuarioTime = 'UPDATE Time SET usuario = ? WHERE id = ?';
            $sql = $this->banco->prepare($cadastroUsuarioTime);
            $sql->bindValue(1,$usuario);
            $sql->bindValue(2,$time);
            $sql->execute();
            
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    //Busca o time do usuário no campeonato
    public function buscarTimeCampeonato(){
        
        $sql = $this->banco->prepare("SELECT id,nome FROM time WHERE usuario = :usuario and campeonato = :campeonato");
        $sql->bindValue(":usuario", $_SESSION['idUsuario']);
        $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
        $sql->execute(); 
        
        while ($dado = $sql->fetch()) {
            $time[]= $dado['id'];
            $time[]= $dado['nome'];
        }
        
        return $time;
    }
    
    //Busca dinheiro do time
    public function buscarDinheiroMeuTime(){
        
        $sql = $this->banco->prepare("SELECT dinheiro FROM time WHERE id = :time");
        $sql->bindValue(":time", $_SESSION['idTime']);
        $sql->execute();
        
        while ($dado = $sql->fetch()) {
            $dinheiro= $dado['dinheiro'];
           
        }
        
        return $dinheiro;
    }
    
    //Esta função busca times no mesmo grupo de um campeonato, e os retorno em um array com todos dados para tabela de grupos
    public function buscarTimeGrupoTabela($grupo){
        
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = $this->banco->prepare("SELECT nome,vitoria,ponto,derrota,empate,pontosFeitos,pontosSofridos 
FROM time WHERE grupo =:grupo and campeonato =:campeonato ");
            $sql->bindValue(":grupo", $grupo);
            $sql->bindValue(":campeonato", $_SESSION['idCampeonato']);
            $sql->execute();
            
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $times[]=$row->nome;
                $times[]=$row->vitoria;
                $times[]=$row->ponto;
                $times[]=$row->derrota;
                $times[]=$row->empate;
                $times[]=$row->pontosfeitos;
                $times[]=$row->pontossofridos;
            }
                       
            return $times;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
        }
    }
}