<?php

//Classe que gerencia o controle sobre os jogos
class JogoControle extends ControladorVisao{
    
    //Função responsável armazenar em arrays todos time de um grupo, em determinado campeonato
    //encaminhar para função de cadastro
    public function gerarFaseGrupo(){
         
        $timeDao = new TimeDAO();
        
        //Busca todos times do campeonato por grupo e os armazena em uma array
        $timesGrupo1 = $timeDao->buscarTimeGrupo(1);
        $timesGrupo2 = $timeDao->buscarTimeGrupo(2);
        $timesGrupo3 = $timeDao->buscarTimeGrupo(3);
        $timesGrupo4 = $timeDao->buscarTimeGrupo(4);   
       
        $this->cadastrarJogo($timesGrupo1);
        $this->cadastrarJogo($timesGrupo2);
        $this->cadastrarJogo($timesGrupo3);
        $this->cadastrarJogo($timesGrupo4);
        
    }
    
    //Função responsável pelo controle de cadastro dos jogos de acordo com suas rodadas
    public function cadastrarJogo($time){
        
        $jogoDao = new JogoDAO();
        $grupo = "grupo";
        
        //Rodada1
        $timeCasa = $time[0];
        $timeVisitante =$time[1];
                
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>1
        ));
        
        $jogoDao->cadastrar($jogo);
      
        $timeCasa = $time[2];
        $timeVisitante =$time[3];
        
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>1
        ));
        
        $jogoDao->cadastrar($jogo);
        
        //Rodada2
        $timeCasa = $time[0];
        $timeVisitante =$time[2];
        
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>2
        ));
        
        $jogoDao->cadastrar($jogo);
        
        $timeCasa = $time[1];
        $timeVisitante =$time[3];
        
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>2
        ));
        $jogoDao->cadastrar($jogo);
        
        //Rodada3
        $timeCasa = $time[1];
        $timeVisitante =$time[2];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>3
        ));
        $jogoDao->cadastrar($jogo);
        
        $timeCasa = $time[3];
        $timeVisitante =$time[0];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>3
        ));
        $jogoDao->cadastrar($jogo);
        
        //Rodada 4
        $timeCasa = $time[1];
        $timeVisitante =$time[0];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>4
        ));
        $jogoDao->cadastrar($jogo);
        
        $timeCasa = $time[3];
        $timeVisitante =$time[2];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>4
        ));
        $jogoDao->cadastrar($jogo);
        
        //Rodada5
        $timeCasa = $time[2];
        $timeVisitante =$time[0];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>5
        ));
        $jogoDao->cadastrar($jogo);
                
        $timeCasa = $time[3];
        $timeVisitante =$time[1];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>5
        ));
        $jogoDao->cadastrar($jogo);
        
        //Rodada6
        $timeCasa = $time[2];
        $timeVisitante =$time[1];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>6
        ));
        $jogoDao->cadastrar($jogo);
        
        $timeCasa = $time[0];
        $timeVisitante =$time[3];
        $jogo =  new Jogo(array('timeCasa'=>$timeCasa,
            'timeVisitante'=>$timeVisitante,
            'campeonato'=>$_SESSION['idCampeonato'],
            'tipo'=>$grupo,
            'rodada'=>6
        ));
        $jogoDao->cadastrar($jogo);
        
    }
        
}

        /*for($a=1;$a<=6;$a++){
        
        echo "Rodada".$a."<br>";
        //Faz um copia do array
        $timeGrupo1Copia = $timesGrupo1;
        
        do{
            $y=1;
            //Seleciona o timeCasa do primeiro jogo e após o remove
            $i = array_rand($timeGrupo1Copia,1);
            $timeCasa = $timeGrupo1Copia[$i];
            unset($timeGrupo1Copia[$i]);
            
            
            //Seleciona o timeVisitante do primeiro jogo e após o remove
            $i = array_rand($timeGrupo1Copia,1);
            $timeVisitante = $timeGrupo1Copia[$i];
            unset($timeGrupo1Copia[$i]);
            
            $jogo = array($timeCasa,$timeVisitante);
            
            if(in_array(array($timeCasa,$timeVisitante), $todoJogo)){
                $y=10;
            }
            else {
                echo "Jogo -".$timeCasa."x".$timeVisitante;
                echo "<p>";
                
                $todoJogo[] = $jogo;
            }
            //Seleciona o timeCasa do segundo jogo e após o remove
            $i = array_rand($timeGrupo1Copia,1);
            $timeCasa2 = $timeGrupo1Copia[$i];
            unset($timeGrupo1Copia[$i]);
            
            //Seleciona o timeVisitante do segundo jogo e após o remove
            $i = array_rand($timeGrupo1Copia,1);
            $timeVisitante2 = $timeGrupo1Copia[$i];
            unset($timeGrupo1Copia[$i]);
            
            $jogo = array($timeCasa2,$timeVisitante2);
            
            
            //Verifica se o jogo já existe
            if(in_array(array($timeCasa2,$timeVisitante2), $todoJogo)){
                $y=10;
            }
            else{
                echo "Jogo -".$timeCasa2."x".$timeVisitante2;
                echo "<p>";
                
                $todoJogo[] = $jogo;
            }
        }while($y > 8);
        }
        
        
        //print_r($jogo);
        
        //print_r($todoJogo);
        
    }
}