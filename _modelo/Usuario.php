<?php

class Usuario {
    
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $login;
    private $senha;
    
    public function __construct($array){
        $this->id = (isset($array['id']))?$array['id']:'';
        $this->nome = (isset($array['nome']))?$array['nome']:'';
        $this->sobrenome = (isset($array['sobrenome']))?$array['sobrenome']:'';
        $this->email = (isset($array['email']))?$array['email']:'';
        $this->login = (isset($array['login']))?$array['login']:'';
        $this->senha = (isset($array['senha']))?$array['senha']:'';
    }
    
	public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    public function getLogin()
    {
        return $this->login;
    }
    
    public function getSenha()
    {
        return $this->senha;
    }
    
    public function verificaSenha($senha, $confirmaSenha){
        
        if ($senha == $confirmaSenha){
            return true;
        }
        else {
            return false;
        }
    }
}
?>