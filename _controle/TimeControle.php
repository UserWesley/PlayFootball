<?php

//Classe que representa o controle sobre a classe time
class TimeControle extends ControladorVisao {
    
    //Caso o usuário já esteja logado, ir pra tela de carregamento
    public function index() {
        
        if(empty($_SESSION['login'])){
            $this->loadTemplate('login');
        }
        else {
            $this->loadTemplate('carregamento');
        }
    }
    
    //Função para gerar 16 times e dividi-los em seus grupos, selecionando suas opções
    public function gerarTimes(){
        
        $nomesTime = array();
        
        $timeDao = new TimeDAO();
        $funcoesTime = new Time();
        
        $nomesTime = $funcoesTime->nomeTime();
        
        for($i=1;$i<=16;$i++){
            
            if($i<=4){ $grupo=1;}
            else if($i<=8){ $grupo=2;}
            else if($i<=12){ $grupo=3;}
            else if($i<=16){ $grupo=4;}
            
            $torcida = 1000;
            $dinheiro = 10000;
            $patrocinio = 10000;
            
            $time = new Time(array(
                'nome'=>$i,
                'torcida'=>$torcida,
                'vitoria'=>'0',
                'ponto'=>'0',
                'derrota'=>'0',
                'empate'=>'0',
                'dinheiro'=>$dinheiro,
                'pontosFeitos'=>'0',
                'pontosSofridos'=>'0',
                'grupo'=>$grupo,
                'patrocinio'=>$patrocinio,
                'campeonato'=>$_SESSION['idCampeonato']
                
                ));
            
            $timeDao->cadastrar($time);
            
            //Recuperar o id do ultimo time registrado no campeonato pelo usuário
            $idTime = $timeDao->idUltimoTimeRegistrado($time);
           
            //Gerar todos jogadores de cada time
            $jogadorControle = new JogadorControle();
            $jogadorControle->gerarJogador($idTime);
            
        }
    }
}