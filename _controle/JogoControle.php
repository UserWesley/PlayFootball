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
       
        $this->cadastrarJogo($timesGrupo1,1);
        $this->cadastrarJogo($timesGrupo2,2);
        $this->cadastrarJogo($timesGrupo3,3);
        $this->cadastrarJogo($timesGrupo4,4);
        
    }
    
    //Função responsável pelo controle de cadastro dos jogos de acordo com suas rodadas
    public function cadastrarJogo($time,$grupo){
        
        $jogoDao = new JogoDAO();
        
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