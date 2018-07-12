<?php

//Classe que represente a entidade usuario, quando existem operações com o banco de dados
class UsuarioDAO extends model{
    
    public function __construct(){
        parent::__construct();
    }
    
    //Função que obtem dados dos usuario
    public function get($campos = array(), $where=array()){
        $usuarios = array();
        $valores = array();
        if(count($campos) == 0){
            $campos = array('*');
            
        }
        
        $sql = "SELECT ".implode(', ',$campos)." from usuario ";
        
        if(count($where) > 0){
            $tabelas = array_keys($where);
            $valores = array_values($where);
            $comp = array();
            
            foreach ($tabelas as $tabela){
                $comp[] = $tabela." = ?";
            }
            
            $sql .= ' WHERE '.implode(' AND ', $comp);
            //$sql .= implode("and", $comp);
        }
        $sql = $this->banco->prepare($sql);
        $sql->execute($valores);
        
        if($sql->rowCount() >0){
            foreach($sql->fetchAll() as $item){
                $usuarios[] = new Usuario($item);
            }
        }
        
        return $usuarios;
    }
    
    //Função que cadastra usuários
    public function cadastrar(Usuario $usuario) {
       
        try{
            $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $this->banco->prepare("INSERT INTO usuario (nome,sobrenome,email,login,senha) 
VALUES(:nome, :sobrenome, :email,:login, :senha)");
            
            $sql->bindValue(":nome", $usuario->getNome());
            $sql->bindValue(":sobrenome", $usuario->getSobrenome());
            $sql->bindValue(":email", $usuario->getEmail());
            $sql->bindValue(":login", $usuario->getLogin());
            $sql->bindValue(":senha", md5($usuario->getSenha()));

            $sql->execute();            
            return true;
            
        }catch(PDOException $e){
            echo "ERRO ".$e->getMessage();
            
        }
        
    }
    
    //Função identifica usuário e senha no banco
    public function verificalogon(Usuario $usuario) {
        $this->banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $this->banco->prepare("SELECT id,nome, sobrenome, login FROM usuario WHERE login = :login AND senha = :senha");
        $sql->bindValue(":login", $usuario->getLogin());
        $sql->bindValue(":senha", md5($usuario->getSenha()));
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUsuario'] = $dado['id'];
            $_SESSION['nome'] = $dado['nome'];
            $_SESSION['sobrenome'] = $dado['sobrenome'];
            $_SESSION['login'] = $dado['login'];
            return true;
        } else {
            return false;
        }
        
    }
    
    //Função que verifica se já existe o e-mail cadastrado
    public function verificaEmail(Usuario $usuario) {
   
        $sql = $this->banco->prepare("SELECT email FROM usuario WHERE email = :email");
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            
            return true;
        } else {
            return false;
        }
        
    }
    
    //Função que verifica se já existe algum login com este mesmo nome
    public function verificaLogin(Usuario $usuario) {
        
        $sql = $this->banco->prepare("SELECT login FROM usuario WHERE login = :login");
        $sql->bindValue(":login", $usuario->getLogin());
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}