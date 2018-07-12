<?php

//Classe que identifica a identidade campeonato
class Campeonato {
    
    private $id;
    private $nome;
    private $ano;
    private $usuario;
    private $fase;
    
    public function __construct($array){
        $this->id = (isset($array['id']))?$array['id']:'';
        $this->nome = (isset($array['nome']))?$array['nome']:'';
        $this->ano = (isset($array['ano']))?$array['ano']:'';
        $this->usuario = (isset($array['usuario']))?$array['usuario']:'';
        $this->fase = (isset($array['fase']))?$array['fase']:'';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getFase()
    {
        return $this->fase;
    }

    
}