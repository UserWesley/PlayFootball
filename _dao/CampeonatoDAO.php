<?php

//Classe que representa a entidade campeonato, quando existem operações com o banco de dados
class CampeonatoDAO extends model{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Função cadastrar Campeonato
    public function cadastrar(Campeonato $campeonato) {
        
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $this->banco->prepare("INSERT INTO campeonato (nome,ano,usuario,fase)
VALUES(:nome, :ano, :usuario, :fase)");
            
            $sql->bindValue(":nome", $campeonato->getNome());
            $sql->bindValue(":ano", $campeonato->getAno());
            $sql->bindValue(":usuario", $campeonato->getUsuario());
            $sql->bindValue(":fase", $campeonato->getFase());
            
            $sql->execute();
            return true;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
            
        }
        
    }
    
    //Função que verifica, se já existe um carregamento com o mesmo nome de campeonato
    public function verificaNome(Campeonato $campeonato) {
        
        $sql = $this->banco->prepare("SELECT nome FROM campeonato WHERE nome = :nome and usuario = :usuario");
        $sql->bindValue(":nome", $campeonato->getNome());
        $sql->bindValue(":usuario", $campeonato->getUsuario());
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            
            return true;
        } else {
            return false;
        }
        
    }
    
    //Função que verifica em fase do campeonato ele está
    public function verificaFase(Campeonato $campeonato) {
        
        $sql = $this->banco->prepare("SELECT login FROM campeonato WHERE login = :login");
        $sql->bindValue(":login", $campeonato->getLogin());
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    //Função que retornará o ultimo registro de um campeonato realizado por um usuário
    public function ultimoRegistroCampeonatoporUsuario( Campeonato $campeonato){

        $sql = $this->banco->prepare("SELECT id FROM campeonato WHERE nome = :nome and usuario=:usuario");
        $sql->bindValue(":nome", $campeonato->getNome());
        $sql->bindValue(":usuario", $campeonato->getUsuario());
        $sql->execute();
        
        $dado = $sql->fetch();
        $ultimoId= $dado['id'];
        return $ultimoId;
    } 
    
    //FUnção para carregar todos jogos salvos
    public function carregarTodosCarregamentos($usuario){
   
        $sql = $this->banco->prepare("SELECT id,nome FROM campeonato WHERE usuario = :usuario");
        $sql->bindValue(":usuario", $usuario);
        $sql->execute();
        
        while ($dado = $sql->fetch()) {
            $jogosSalvos[$dado['id']] = $dado['nome'];
        }
        return $jogosSalvos;
    }
}
