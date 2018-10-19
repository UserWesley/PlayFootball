<?php

//Classe responsável por gerenciar partidas
class PartidaControle extends ControladorVisao{
   
    //Verifica se o usuário está logados
    public function index() {
        
        if(empty($_SESSION['login'])){
            $this->loadTemplate('login');
        }
        else{
            echo "Não pode acessar direto!";
        }
    }
    
    //Função que carrega Tela e recebi parametro
    public function carregarTelaPartida($params){

        //dados iniciais da partida
        //tempo
        $_SESSION['tempo'] = 0;
        
        unset($_SESSION['acontecimento']);
        $_SESSION['acontecimento'][] = "<b>Início de Partida ! <br> --------------------------------------------------</b>";
        //Período
        $periodo= "1";
        
        //placar
        $_SESSION['placarCasa']= 0;
        $_SESSION['placarVisitante']= 0;
        
        //Definindo primeiro evento da partida
        //Definindo ação do usuário
        $partida = new Partida();
        $acontecido = $partida->definirAcao($params);
        
        //Posição da bola
        $_SESSION['posicaoBola'] = 0;
        
        //Jardas da posição da bola até a linha de endzone
        $jardasendzone = 100;
        
        //Número da decida do time de ataque
        $_SESSION['decida'] = 0;

        //Jogadores do meu time
        $jogadorDao = new JogadorDAO();
        $jogadores = $jogadorDao->buscarJogadorMeuTimeComId(); 
        
        $acaoUsuario = null;
        
        //Passando atributos por array
        $dadosPartida[]= $periodo;
        $dadosPartida[]= $acontecido;
        $dadosPartida[]= $jardasendzone;
        $dadosPartida[]= $dado;
        $dadosPartida[]= $jogadores;
        $dadosPartida[]= $acaoUsuario;
        
        //Carregando tela da partida com dados
        $this->loadTemplatePartida('partida',$dadosPartida);
    }
    
    //Função consultar avaliar jogada
    public function analisarJogada(){
        
        //Fim da partida sempre se inicia nulo
        $fimPartida = null;
        
        //Controle de ação kickoff inicial
        if($_SESSION['acao'] == "Kickoff"){
            
            //verficar qual time esta atacando
            if($_SESSION['nomeTime'] == $_SESSION['timeCasa']){
                $ataque= 2;
            }else {
                $ataque= 1;
            }
            
            //Levantando os dados dos jogadores de cada time para o confrontos
            $estrategia = new EstrategiaControle();
            $dados = $estrategia->kickoff();
            
            //Analisando a jogadoda do kickoff
            $analiseJogada = new AnalisadorJogadas();
            $dadosAnalisados = $analiseJogada->kickoff($dados,1);
            
            //Utilizar funções da classes modelo partida
            $partida = new Partida();
            
            //tempo do partida somado com da jogada
            $_SESSION['tempo'] = $_SESSION['tempo'] + $dadosAnalisados[1];
            
            //Formantando o tempo se necessário
            $_SESSION['tempo'] = $partida->formataTempo($_SESSION['tempo']);
            
            //Verificando fim de partida
            $fimPartida = $partida->verificaFim($_SESSION['tempo']);
            
            //verificando periodo
            $periodo = $partida->verificarPeriodo($_SESSION['tempo']);
            
            //Verificar placar
            //Posição da bola sempre 0 , porque é kickoff
            $_SESSION['posicaoBola'] = 0;
            $acontecidoExtraPlacar = $partida->verificaPlacar($dadosAnalisados[0],$ataque,1);
            
            //Evento de acontecimento na jogada
            $acontecido = $dadosAnalisados[2];
            
            //Analisando quantas jardas faltam para endzone
            $jardasendzone = $partida->analisarJardasEndZone($dadosAnalisados[0]);
            
            //Analisando quantas jardas para o proximo down, posicionamento da bola e a 
            //quantidade de tentativas de ataque
            $partida->definirDadosPartidaKickOff($dadosAnalisados[0]);
            
            //Analisando proxima ação
            if($fimPartida == "Fim de Partida"){
                $_SESSION['acao'] = "Fim de Partida";
            }
            else {             
                $acaoUsuario = $partida->definirAcao($dadosAnalisados[3]);
            }
            
            //Jogadores do meu time
            $jogadorDao = new JogadorDAO();
            $jogadores = $jogadorDao->buscarJogadorMeuTimeComId();
            
            //Passando dados resultante das analises para o tela do jogo
            $dadosPartida[]= $periodo;
            $dadosPartida[]= $acontecido;
            $dadosPartida[]= $jardasendzone;
            $dadosPartida[]= $acontecidoExtraPlacar[0];
            $dadosPartida[]= $jogadores;
            $dadosPartida[]= $acaoUsuario;
            
            //Sessão com todos acontecimentos
            $_SESSION['acontecimento'][] = "<b>Tempo : </b>".$_SESSION['tempo'];
            $_SESSION['acontecimento'][] = "<b>Resultado Jogada : </b>".$acontecido;
            $_SESSION['acontecimento'][] = $acontecidoExtraPlacar[0];
            $_SESSION['acontecimento'][] = "<b>Ação Usuário : </b>".$acaoUsuario;
            
            //Não me lembro 
            if(!empty($fimPartida)){
                $dadosPartida[]= $fimPartida;
            }
            $this->loadTemplatePartida('partida',$dadosPartida);
            
        }
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Controle de ação Retorno de kickoff 
        else if($_SESSION['acao'] == "Retornar Kickoff"){
            
            //verficar qual time esta atacando
            if($_SESSION['nomeTime'] == $_SESSION['timeCasa']){
                $ataque= 1;
            }else {
                $ataque= 2;
            }
            
            //Levantando os dados dos jogadores de cada time para o confrontos
            $estrategia = new EstrategiaControle();
            $dados = $estrategia->kickoff();
            
            //Analisando a jogadoda do kickoff
            $analiseJogada = new AnalisadorJogadas();
            $dadosAnalisados = $analiseJogada->kickoff($dados,2);
            
            //Utilizar funçoes da classes modelo partida
            $partida = new Partida();
            
            //tempo do partida somado com da jogada
            $_SESSION['tempo'] = $_SESSION['tempo'] + $dadosAnalisados[1];
            
            //Formantando o tempo se necessário
            $_SESSION['tempo'] = $partida->formataTempo($_SESSION['tempo']);
            
            //Verificando fim de partida
            $fimPartida = $partida->verificaFim($_SESSION['tempo']);
            
            //verificando periodo
            $periodo = $partida->verificarPeriodo($_SESSION['tempo']);
            
            //Verificar placar
            //Posição da bola sempre 0 , porque é kickoff
            $_SESSION['posicaoBola'] = 0;
            $acontecidoExtraPlacar = $partida->verificaPlacar($dadosAnalisados[0],$ataque,2);
            
            //Evento de acontecimento na jogada
            $acontecido = $dadosAnalisados[2];
            
            //Analisando quantas jardas faltam para endzone
            $jardasendzone = $partida->analisarJardasEndZone($dadosAnalisados[0]);
            
            //Analisando quantas jardas para o proximo down, posicionamento da bola e a
            //quantidade de tentativas de ataque
            $partida->definirDadosPartidaKickOff($dadosAnalisados[0]);
            
            //Analisando proxima ação
            if($fimPartida == "Fim de Partida"){
                $_SESSION['acao'] = "Fim de Partida";
            }
            else {
                $acaoUsuario = $partida->definirAcao($dadosAnalisados[4]);
            }
            
            //Jogadores do meu time
            $jogadorDao = new JogadorDAO();
            $jogadores = $jogadorDao->buscarJogadorMeuTimeComId();
            
            //Passando dados resultante das analises para o tela do jogo
            $dadosPartida[]= $periodo;
            $dadosPartida[]= $acontecido;
            $dadosPartida[]= $jardasendzone;
            $dadosPartida[]= $acontecidoExtraPlacar[0];
            $dadosPartida[]= $jogadores;
            $dadosPartida[]= $acaoUsuario;
            
            //Sessão com todos acontecimentos
            $_SESSION['acontecimento'][] = "<b>Tempo : </b>".$_SESSION['tempo'];
            $_SESSION['acontecimento'][] = "<b>Resultado Jogada : </b>".$acontecido;
            $_SESSION['acontecimento'][] = $acontecidoExtraPlacar[0];
            $_SESSION['acontecimento'][] = "<b>Ação Usuário : </b>".$acaoUsuario;
            
            //Não me lembro
            if(!empty($fimPartida)){
                $dadosPartida[]= $fimPartida;
            }
            $this->loadTemplatePartida('partida',$dadosPartida);
            
        }
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Controle de ação ATACAR
        else if($_SESSION['acao'] == "Atacar"){
            
            //verficar qual time esta atacando
            if($_SESSION['nomeTime'] == $_SESSION['timeCasa']){
                $ataque = 1;
            
            }else {
                $ataque= 2;
            }
            
            //capturando dados da formação
            $formacao = $_GET['formacao'];
            $estrategia = $_GET['estrategia'];
            $linha = $_GET['linha'];
            $marcacao = null;
                       
            //Levantando os dados dos jogadores de cada time para o confrontos
            $estrategiaControle = new EstrategiaControle();
            $dados = $estrategiaControle->kickoff();
            
            //Analisando a jogado do ataque contra defesa
            $analiseJogada = new AnalisadorJogadas();
            $dadosAnalisados = $analiseJogada->atacarxDefender($dados,4,$formacao,$estrategia,$linha,$defender);
            
            //tempo do partida somado com da jogada
            $_SESSION['tempo'] = $_SESSION['tempo'] + $dadosAnalisados[1];
            
            //Utilizar funçoes da classes modelo partida
            $partida = new Partida();
            
            //Formantando o tempo se necessário
            $_SESSION['tempo'] = $partida->formataTempo($_SESSION['tempo']);
            
            //Verificando fim de partida
            $fimPartida = $partida->verificaFim($_SESSION['tempo']);
            
            //verificando periodo
            $periodo = $partida->verificarPeriodo($_SESSION['tempo']);
            
            //Verificando posicao da bola atual
            $_SESSION['posicaoBola'] = $_SESSION['posicaoBola'] + $dadosAnalisados[0];
            
            //Verificar placar
            $acontecidoExtraPlacar = $partida->verificaPlacar($_SESSION['posicaoBola'],$ataque,4);
            
            //Evento de acontecimento na jogada
            $acontecido = $dadosAnalisados[2];
            
            //Analisando quantas jardas para o proximo down, posicionamento da bola e a
            //quantidade de tentativas de ataque
            //$partida->definirDadosPartidaAtaqueDefesa($dadosAnalisados[0]);
            
            //Analisando quantas jardas faltam para endzone
            $jardasendzone = $partida->analisarJardasEndZone($_SESSION['posicaoBola']);
            
            //Analisando proxima ação
            if($fimPartida == "Fim de Partida"){
                $_SESSION['acao'] = "Fim de Partida !";
            }
            else {
                if(!empty($acontecidoExtraPlacar[1])){
                    
                    $acaoUsuario = $partida->definirAcao($acontecidoExtraPlacar[1]);
                }else{
                    $acaoUsuario = $partida->definirAcao($dadosAnalisados[4]);
                }
            }
            
            //Jogadores do meu time
            $jogadorDao = new JogadorDAO();
            $jogadores = $jogadorDao->buscarJogadorMeuTimeComId();   
            
            //Passando dados resultante das analises para o tela do jogo
            $dadosPartida[]= $periodo;
            $dadosPartida[]= $acontecido;
            $dadosPartida[]= $jardasendzone;
            $dadosPartida[]= $acontecidoExtraPlacar[0];
            $dadosPartida[]= $jogadores;
            $dadosPartida[]= $acaoUsuario;
            
            //Sessão com todos acontecimentos
            $_SESSION['acontecimento'][] = "<b>Tempo : </b>".$_SESSION['tempo'];
            $_SESSION['acontecimento'][] = "<b>Resultado Jogada : </b>".$acontecido;
            $_SESSION['acontecimento'][] = $acontecidoExtraPlacar[0];
            $_SESSION['acontecimento'][] = "<b>Ação Usuário : </b>".$acaoUsuario;
            
            if(!empty($fimPartida)){
                $dadosPartida[]= $fimPartida;
            }
            $this->loadTemplatePartida('partida',$dadosPartida);
               
        }
        
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        //Controle de ação de DEFENDER
        else if($_SESSION['acao'] == "Defender"){
            
            //verficar qual time esta atacando
            if($_SESSION['nomeTime'] == $_SESSION['timeCasa']){
                $ataque= 2;
            }else {
                $ataque= 1;
            }
            
            //capturando dados da formação
            $formacao = $_GET['formacao'];
            $estrategia = $_GET['estrategia'];
            $marcacao = $_GET['marcacao'];
            $linha= null;
            
            //Levantando os dados dos jogadores de cada time para o confrontos
            $estrategiaControle = new EstrategiaControle();
            $dados = $estrategiaControle->kickoff();
            
            //Analisando a jogado do ataque contra defesa
            $analiseJogada = new AnalisadorJogadas();
            $dadosAnalisados = $analiseJogada->atacarxDefender($dados,5,$formacao,$estrategia,$linha,$marcacao);
            
            //tempo do partida somado com da jogada
            $_SESSION['tempo'] = $_SESSION['tempo'] + $dadosAnalisados[1];
            
            //Utilizar funçoes da classes modelo partida
            $partida = new Partida();
            
            //Formantando o tempo se necessário
            $_SESSION['tempo'] = $partida->formataTempo($_SESSION['tempo']);
            
            //Verificando fim de partida
            $fimPartida = $partida->verificaFim($_SESSION['tempo']);
            
            //verificando periodo
            $periodo = $partida->verificarPeriodo($_SESSION['tempo']);
            
            //Verificar placar
            //Verificando posicao da bola atual
            $_SESSION['posicaoBola'] = $_SESSION['posicaoBola'] + $dadosAnalisados[0];
            $acontecidoExtraPlacar = $partida->verificaPlacar($_SESSION['posicaoBola'],$ataque,5);
            
            //Evento de acontecimento na jogada
            $acontecido = $dadosAnalisados[2];
            
            //Analisando quantas jardas para o proximo down, posicionamento da bola e a
            //quantidade de tentativas de ataque
            //$partida->definirDadosPartidaAtaqueDefesa($dadosAnalisados[0]);
            
            //Analisando quantas jardas faltam para endzone
            $jardasendzone = $partida->analisarJardasEndZone($_SESSION['posicaoBola']);
            
            //Analisando proxima ação
            if($fimPartida == "Fim de Partida"){
                $_SESSION['acao'] = "Fim de Partida !";
            }else {
                if(!empty($acontecidoExtraPlacar[1])){
                    $acaoUsuario = $partida->definirAcao($acontecidoExtraPlacar[1]);
                }else{
                    $acaoUsuario = $partida->definirAcao($dadosAnalisados[3]);
                }
            }
            
            //Jogadores do meu time
            $jogadorDao = new JogadorDAO();
            $jogadores = $jogadorDao->buscarJogadorMeuTimeComId();
            
            //Passando dados resultante das analises para o tela do jogo
            $dadosPartida[]= $periodo;
            $dadosPartida[]= $acontecido;
            $dadosPartida[]= $jardasendzone;
            $dadosPartida[]= $acontecidoExtraPlacar[0];
            $dadosPartida[]= $jogadores;
            $dadosPartida[]= $acaoUsuario;
            
            //Sessão com todos acontecimentos
            $_SESSION['acontecimento'][] = "<b>Tempo : </b>".$_SESSION['tempo'];
            $_SESSION['acontecimento'][] = "<b>Resultado Jogada : </b>".$acontecido;
            $_SESSION['acontecimento'][] = $acontecidoExtraPlacar[0];
            $_SESSION['acontecimento'][] = "<b>Ação Usuário : </b>".$acaoUsuario;
            
            //Verificando se é fim de partida
            if(!empty($fimPartida)){
                $dadosPartida[]= $fimPartida;
            }
            $this->loadTemplatePartida('partida',$dadosPartida);
            
        }else if($_SESSION['acao'] == "Fim de Partida !"){
            $this->loadTemplatePartida('fimPartida',$dadosPartida);
        }
        else{
            $this->loadTemplatePartida('partida',$dadosPartida);
        }  
    }
}