<?php

//Classe que representa a entidade Time
class Time{
    
    //Atributos
    private $id;
    private $nome;
    private $torcida;
    private $vitoria;
    private $ponto;
    private $derrota;
    private $empate;
    private $dinheiro;
    private $pontosFeitos;
    private $pontosSofridos;
    private $grupo;
    private $patrocinio;
    private $usuario;
    private $campeonato;
    
    //Método construtor com array de dados da classe
    public function __construct($array){
        $this->id = (isset($array['id']))?$array['id']:'';
        $this->nome = (isset($array['nome']))?$array['nome']:'';
        $this->torcida = (isset($array['torcida']))?$array['torcida']:'';
        $this->vitoria = (isset($array['vitoria']))?$array['vitoria']:'';
        $this->ponto = (isset($array['ponto']))?$array['ponto']:'';
        $this->derrota = (isset($array['derrota']))?$array['derrota']:'';
        $this->empate = (isset($array['empate']))?$array['empate']:'';
        $this->dinheiro = (isset($array['dinheiro']))?$array['dinheiro']:'';
        $this->pontosFeitos = (isset($array['pontosFeitos']))?$array['pontosFeitos']:'';
        $this->pontosSofridos = (isset($array['pontosSofridos']))?$array['pontosSofridos']:'';
        $this->grupo = (isset($array['grupo']))?$array['grupo']:'';
        $this->patrocinio = (isset($array['patrocinio']))?$array['patrocinio']:'';
        $this->usuario = (isset($array['usuario']))?$array['usuario']:'';
        $this->campeonato = (isset($array['campeonato']))?$array['campeonato']:'';
        
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTorcida()
    {
        return $this->torcida;
    }

    public function getVitoria()
    {
        return $this->vitoria;
    }

    public function getPonto()
    {
        return $this->ponto;
    }

    public function getDerrota()
    {
        return $this->derrota;
    }

    public function getEmpate()
    {
        return $this->empate;
    }

    public function getDinheiro()
    {
        return $this->dinheiro;
    }

    public function getPontosFeitos()
    {
        return $this->pontosFeitos;
    }

    public function getPontosSofridos()
    {
        return $this->pontosSofridos;
    }

    public function getGrupo()
    {
        return $this->grupo;
    }

    public function getPatrocinio()
    {
        return $this->patrocinio;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getCampeonato()
    {
        return $this->campeonato;
    }
    
    public function dinheiroPatrocinio(){
        
        return $patrocinio;
    }
    
    public function dinheiroTime(){
        
        return $dinheiro;
    }
    
    //Função com lista de todos nomes de times disponiveis
    public function nomeTime(){
       
        $nomeTime= array ("Passos","Araras","Hortolândia","Sumaré","Santos","Campinas","Paulinia","Santo André",
                    "Sorocaba","Pedreira","Jaguariuna","Monte Mor","Sousas","Montes Claros","Piracicaba","Araraquara"," Rafard","Lorena");
        return $nomeTime;
    }
    
    //Definirá em qual grupo cada time irá participar
    public function definirGrupo($numeroTime){
        
        if($numeroTime<=4){ $grupo=1;}
        else if($numeroTime<=8){ $grupo=2;}
        else if($numeroTime<=12){ $grupo=3;}
        else if($numeroTime<=16){ $grupo=4;}
        
        return $grupo;
    }
    
    //Função que sorteará dentro de um array, um nome de um time.
    public function sorteaNomeTime($nomeTime){
        //Sorteio nome
        $chave = array_rand($nomeTime,1);
        
        $dadosNomeTime[] = $chave;
        $dadosNomeTime[] = $nomeTime[$chave];
        
        return $dadosNomeTime;
    }

}