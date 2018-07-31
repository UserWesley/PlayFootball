<?php

//Classe que representa o menu de controle do campeonato
class MenuCampeonatoControle  extends ControladorVisao{
    
    //Verifica se o usuário está logados
    public function index() {
        
        if(empty($_SESSION['login'])){
            $this->loadTemplate('login');
        }
        else {
            $this->loadTemplate('cadastroNovoJogo');
        }
    }
    
    //Função responsável por carregar dados dos campeonato
    public function carregarTelaPerfil(){
        
        //Carregar tela de layoutCampeonato
        $this->loadTemplateCampeonato('perfil');
        
    }
    
    //Função responsável por carregar a tela com jogadores do time do usuário
    public function carregarTelaMeusJogadores(){
        
        $jogadorDao = new JogadorDAO();
        $jogadores = $jogadorDao->buscarJogadorMeuTime();
        
        //Carregar tela de layoutCampeonato
        $this->loadTemplateCampeonato('meusJogadores',$jogadores);
    }
    
    //Função responsável por carregar a tela de finanças
    public function carregarTelaMinhaFinanca(){
        
        //buscando dinheiro do clube
        $timeDao = new TimeDAO();
        $dinheiro = $timeDao->buscarDinheiroMeuTime();
        
        //Carregar tela de layoutCampeonato
        $this->loadTemplateCampeonato('minhaFinancas',$dinheiro);
    }
    
    //Função responsável por carregar a tela de dados time
    public function carregarTelaDadosTime(){
        
        //Nome do clube está na sessão
        //Carregar tela de layoutCampeonato
        $this->loadTemplateCampeonato('dadoTime');
    }
    
    //Função responsável por carregar tela fase Grupo
    public function carregarTelaFaseGrupo(){
        
        //Buscando todos times por grupo do campeonato  e armazenando no array
        $timeDao = new TimeDAO();
        $grupo1 = $timeDao->buscarTimeGrupoTabela(1);
        $grupo2 = $timeDao->buscarTimeGrupoTabela(2);
        $grupo3 = $timeDao->buscarTimeGrupoTabela(3);
        $grupo4 = $timeDao->buscarTimeGrupoTabela(4);
        
        //Agrupando todos array em um único, para distribuir na tela grupos tabela.
        $grupos[]=$grupo1;
        $grupos[]=$grupo2;
        $grupos[]=$grupo3;
        $grupos[]=$grupo4;
        
        //Carregando tela de tabela dos grupos com template campeonato
        $this->loadTemplateCampeonato('grupoTime',$grupos);
        
    }
    
    //Função responsável por carregar tela dos jogos
    public function carregarTelaJogoGrupo(){
        ini_set('display_errors',1);
        ini_set('display_startup_erros',1);
        error_reporting(E_ALL);
        //Buscando todos jogos por rodada do campeonato  e armazenando no array
        $jogoDao = new JogoDAO();
        $rodada1 = $jogoDao->buscarJogoRodada(1,1);
        //$rodada2 = $jogoDao->buscarTimeGrupoTabela(2);
        //$rodada3 = $jogoDao->buscarTimeGrupoTabela(3);
        //$rodada4 = $jogoDao->buscarTimeGrupoTabela(4);
        //$rodada5 = $jogoDao->buscarTimeGrupoTabela(5);
        //$rodada6 = $jogoDao->buscarTimeGrupoTabela(6);
        print_r($rodada1);
        /*
        //Agrupando todos array em um único, para distribuir na tela jogo.
        $rodadas[]=$rodada1;
        $rodadas[]=$rodada2;
        $rodadas[]=$rodada3;
        $rodadas[]=$rodada4;
        $rodadas[]=$rodada5;
        $rodadas[]=$rodada6;
        */
        //Carregando tela de tabela dos jogos com template campeonato
        //$this->loadTemplateCampeonato('jogoGrupo');
        
    }
}