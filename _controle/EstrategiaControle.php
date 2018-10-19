<?php

//CLasse que gerencia o controle de estrategias
class EstrategiaControle{
    
    //Retorna a forca do time Kickoff e do adversario
    public function kickoff(){
        
        $jogadorDao = new JogadorDAO();
        $jogadores= array("1","2","3","4","5","6","7","8","9","10","11");
        $habilidadesMeuJogadores = $jogadorDao->buscarHabilidadesJogador($jogadores);
        
        $jogadores= array("11","12","13","14","15","16","17","18","19","110","111");
        $habilidadesAdversario = $jogadorDao->buscarHabilidadesJogador($jogadores);
        
        $dados[] = $habilidadesMeuJogadores;
        $dados[] = $habilidadesAdversario;
        
        return $dados; 
    }
    
    //Retorna id dos jogadores do time para realizar jogada
    public function selecionarEscalacaoBubbleScreen(){
    
        //buscar QB
        
        //buscar Center
        
        //running back
        
        //buscar Slot 1
        //buscar WideRecivier 2
        //buscar WideRecivier 3
        //buscar WideRecivier 4
    }
    
    //Selecionar escalação dos jogadores para estratégia de ataque power T
    public function selecionarEscalacaoAtaquePowerT(){
        
        //Buscar QB
        
        //Buscar center
        //Buscar tighend Esquerdo
        //Buscar tighend Direito
        //Buscar offensive guard Esquerdo
        //Buscar offensive guard Direito
        //Buscar offensive tackle Esquerdo
        //Buscar offensive tackle Direito
        //Buscar halfback esquerdo
        //Buscar halfback direito
        //Buscar fullback
        
        
        
    }
    
    ////Selecionar escalação dos jogadores para estratégia de ataque Shotgun
    public function selecionarEscalacaoAtaqueShotgun(){
        
        //buscar QB
        
        //Buscar center
        
        //Buscar offensive guard Esquerdo
        //Buscar offensive guard Direito
        //Buscar offensive tackle Esquerdo
        //Buscar offensive tackle Direito
        
        //Buscar TIghtenddireito
        
        //buscar WideRecivier direito1
        //buscar WideRecivier Slot 2
        //buscar WideRecivier 3
        
        //buscar halfback
    }
}