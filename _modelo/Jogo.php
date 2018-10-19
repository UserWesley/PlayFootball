<?php

//Classe representa a entidade jogo
class Jogo{
    
    //Atributos da classe jogo
    private $id;
    private $timeCasa;
    private $pontosFeitoTimeCasa;
    private $pontosTomadosTimeCasa;
    private $timeVisitante;
    private $pontosFeitoTimeVisitante;
    private $pontosTomadosTimeVisitante;
    private $data;
    private $dadosJogo;
    private $campeonato;
    private $rodada;
    private $tipo;
    private $publico;
    
    //Metódo construtor
    public function __construct($array){
      
        $this->id = (isset($array['id']))?$array['id']:'';
        $this->timeCasa = (isset($array['timeCasa']))?$array['timeCasa']:'';
        $this->pontosFeitoTimeCasa = (isset($array['pontosFeitoTimeCasa']))?$array['pontosFeitoTimeCasa']:'';
        $this->pontosTomadosTimeCasa = (isset($array['pontosTomadosTimeCasa']))?$array['pontosTomadosTimeCasa']:'';
        $this->timeVisitante = (isset($array['timeVisitante']))?$array['timeVisitante']:'';
        $this->pontosFeitoTimeVisitante = (isset($array['pontosFeitoTimeVisitante']))?$array['pontosFeitoTimeVisitante']:'';
        $this->pontosTomadosTimeVisitante = (isset($array['pontosTomadosTimeVisitante']))?$array['pontosTomadosTimeVisitante']:'';
        $this->data = (isset($array['data']))?$array['data']:'';
        $this->dadosJogo = (isset($array['dadosJogo']))?$array['dadosJogo']:'';
        $this->campeonato = (isset($array['campeonato']))?$array['campeonato']:'';
        $this->rodada = (isset($array['rodada']))?$array['rodada']:'';
        $this->tipo = (isset($array['tipo']))?$array['tipo']:'';
        $this->publico = (isset($array['publico']))?$array['publico']:'';
      
    }
    
    //Metódos getters
    public function getId()
    {
        return $this->id;
    }

    public function getTimeCasa()
    {
        return $this->timeCasa;
    }

    public function getPontosFeitoTimeCasa()
    {
        return $this->pontosFeitoTimeCasa;
    }

    public function getPontosTomadosTimeCasa()
    {
        return $this->pontosTomadosTimeCasa;
    }

    public function getTimeVisitante()
    {
        return $this->timeVisitante;
    }

    public function getPontosFeitoTimeVisitante()
    {
        return $this->pontosFeitoTimeVisitante;
    }

    public function getPontosTomadosTimeVisitante()
    {
        return $this->pontosTomadosTimeVisitante;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getDadosJogo()
    {
        return $this->dadosJogo;
    }

    public function getCampeonato()
    {
        return $this->campeonato;
    }

    public function getRodada()
    {
        return $this->rodada;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getPublico()
    {
        return $this->publico;
    }
    
    // Retorno qual indice do array, esta contido o time do usuario
    public function buscarJogoUsuarioRodada($jogosRodada){
        for($i=0;$i<=7;$i++){
            $jogo = $jogosRodada[$i];
            if($jogo[0] == $_SESSION['nomeTime']){
                $key=$i;
                $_SESSION['timeAdversario'] = $jogo[1];
            }
            else if($jogo[1] == $_SESSION['nomeTime']){
                $key=$i;
                $_SESSION['timeAdversario'] = $jogo[0];
                
            }
            unset($jogo);
        }
        return $jogosRodada[$key];
    }  
}