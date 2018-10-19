<?php

//Classe que realiza as operações da partida
class Partida{

    //função que verifica e formata tempo
    public function formataTempo($tempo){
        
        //Explodindo dados em minutos e em segundos
        $hora = explode('.',$tempo,2);
        
        //minutos
        $minuto = $hora[0];
        
        //segundos
        $segundo = $hora[1];
        
        //segundos tem o limite de 60 segundos
        if($segundo > 59){
            $segundo = $segundo - 60;
            //formatando os segundo com 0 (zero) a frente
            if($segundo <= 9){
                $primeiroDigito[]=0;
                $primeiroDigito[]=$segundo;
                $segundo = implode($primeiroDigito);
            }
            $minuto++;
            
            $minutoSegundo[] = $minuto;
            $minutoSegundo[] = $segundo;
            //Junta o tempo novamente
            $tempoJogo = implode(".",$minutoSegundo);
        }else {
            return $tempo;
        }
        
        //retorna o tempo formatado
        return $tempoJogo; 
    }
        
    //função verificar fim de partida
    public function verificaFim($tempo){
        //tempo limite do jogo 60 minutos
        if($tempo >= 60){
            $texto = "Fim de Partida";
            return $texto;
        }
        else {
            return null;
        }
        
    }
    
    //função que verifica em qual periodo o jogo está
    public function verificarPeriodo($tempo){
        
        //O futebol americano tem 4 periodos a cada quinze minutos
        if($tempo <= 15){
            $periodo= "1";
        }else if($tempo <= 30){
            $periodo= "2";
        }else if($tempo <= 45){
            $periodo= "3";
        }else if($tempo <= 60){
            $periodo= "4";
        }
        
        return $periodo;
    }
    
    //Função que alterar o placar
    public function verificaPlacar($posicaoBola,$ataque,$acao){
        
        //Se ataque estiver igual a 1, significa que o time da casa esta atacando
        if($ataque == 1){
            if($posicaoBola >= 100){
                $_SESSION['placarCasa']= 6+$_SESSION['placarCasa'];
                $_SESSION['posicaoBola']= 0;
                $_SESSION['decida'] = 0;
                if(($acao == 4) || ($acao == 2)){
                    $proximaJogada = 1;
                }
                else {
                    $proximaJogada =2;
                }
                
                $acontecimento = "<b>Touchdown Time Casa ! </b>";
            
            }else if($posicaoBola == -100){
                $_SESSION['placarVisitante']= 6 +$_SESSION['placarVisitante'];
                $_SESSION['posicaoBola']= 0;
                $_SESSION['decida'] = 0;
                if(($acao == 4) || ($acao == 2)){
                    $proximaJogada = 2;
                }else {
                    $proximaJogada = 1;
                }
                $acontecimento = "<b>Touchdown Time Visitante - Fumble e recuperação </b>!";
            
            }else{
                $proximaJogada = null;
                $acontecimento = null;
            }
        //Qualquer outro valor diferente de 1, significa que o time visitante esta atacando
        }else {
            if($posicaoBola >= 100){
                $_SESSION['placarVisitante']= 6+$_SESSION['placarVisitante'];
                $_SESSION['posicaoBola']= 0;
                $_SESSION['decida'] = 0;
                if(($acao == 4) || ($acao == 2)){
                    $proximaJogada = 1;
                }
                else{
                    $proximaJogada = 2;
                }
                $acontecimento = "<b>Touchdown Time Visitante!</b>";
            
            }else if($posicaoBola == -100){
                $_SESSION['placarCasa']= 6 +$_SESSION['placarCasa'];
                $_SESSION['posicaoBola']= 0;
                $_SESSION['decida'] = 0;
                if(($acao == 4) || ($acao == 2)){
                    $proximaJogada = 2;
                }else {
                    $proximaJogada = 1;
                }
                $acontecimento = "<b>Touchdown Time Casa - Fumble e recuperação! </b>";
            
            }else{
                $proximaJogada = null;
                $acontecimento = null;
            }
        }
        
        $dados[]=$acontecimento;
        $dados[]=$proximaJogada;
        
        return $dados;
    }
    
    //função que definirá a ação do jogador
    //trocar futuramento com um array, acessand o número do indice em caso de if e elses
    public function definirAcao($acao){
        
        if($acao == 1){
            $_SESSION['acao'] = "Kickoff";
            return $acontecido = "Esperando usuário realizar o kickoff";
        
        }else if($acao == 2) {
            $_SESSION['acao'] = "Retornar Kickoff";
            return $acontecido = "Esperando usuário definir jogada de retorno do kickoff";
        
        }else if($acao == 3) {
            $_SESSION['acao'] = "Extra Point";
            return $acontecido = "Esperando usuário bater o extra point";
        
        }else if($acao == 4) {
            $_SESSION['acao'] = "Atacar";
            return $acontecido = "Esperando usuário definir jogada de ataque";
            
        }else if($acao == 5) {
            $_SESSION['acao'] = "Defender";
            return $acontecido = "Esperando usuário definir jogada de defesa";
            
        }else if($acao == 6) {
            $_SESSION['acao'] = "Fied Goal";
            return $acontecido = "Esperando usuário definir jogada de field Goal";
        
        }else if($acao == 7) {
            $_SESSION['acao'] = "Defender Field Goal";
            return $acontecido = "Esperando usuário defender jogada de field Goal";
            
        }else if($acao == 8) {
            $_SESSION['acao'] = "Punt";
            return $acontecido = "Esperando usuário definir jogada de Punt";
            
        }else if($acao == 9) {
            $_SESSION['acao'] = "Defender Punt";
            return $acontecido = "Esperando usuário definir jogada de defesa de Punt";
            
        }else if($acao == 10) {
            $_SESSION['acao'] = "Defesa Extra Point";
            return $acontecido = "Esperando usuário definir jogada de defesa de Extra Point";
            
        }
    }
    
    
    //Definir dados da partida - DOwns, posicao bola, jardas para o proximo down
    public function definirDadosPartidaKickOff($avanco){
        if(($avanco>=0) && ($avanco < 100)){
            $_SESSION['posicaoBola'] = $avanco;
            $_SESSION['decida'] = 1;
            
        }else if($avanco >= 100){
            $_SESSION['posicaoBola'] = 0;
            $_SESSION['decida']=0;
            
        }else {
            $_SESSION['posicaoBola'] = 0;
            $_SESSION['decida']=0;
            
        }
    }
    
   /* //Definir dados da partida - DOwns, posicao bola, jardas para o proximo down
    public function definirDadosPartidaAtaqueDefesa($posicaoBola){
        if(($posicaoBola>=0) && ($posicaoBola < 100)){
            $_SESSION['posicaoBola'] = $posicaoBola+$_SESSION['posicaoBola'];
            
            
        }else if($posicaoBola >= 100){
            $_SESSION['posicaoBola'] = 0;
            $_SESSION['decida']=0;
            
        }else {
            $_SESSION['posicaoBola'] = 0;
            $_SESSION['decida']=0;
            
        }
    }
    */
    //Número da decida do ataque
    public function decidaAtaque(){
        $_SESSION['decida']++;  
    }
    
    //Analisando quantas jardas faltam para endzone
    public function analisarJardasEndZone($avanco){
        if(($avanco >=0) && ($avanco < 100)){
            $jardasendzone = 100 - $avanco;
        }else {
            $jardasendzone = 100;    
        }
        
        return $jardasendzone;
    }
    
    //Analisando quantas jardas faltam para endzone ataque defesas
    public function analisarJardasEndZoneAtaqueDefesa($avanco){
        if(($avanco >=0) && ($avanco < 100)){
            $jardasendzone = 100 - $avanco;
        }else {
            $jardasendzone = 100;
        }
        
        return $jardasendzone;
    }
}