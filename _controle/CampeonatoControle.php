<?php

//Classe de controle do campeonato
class CampeonatoControle extends ControladorVisao {
    
    //Verifica se o usuário está logados
    public function index() {
        
        if(empty($_SESSION['login'])){
            $this->loadTemplate('login');
        }
        else {
            $this->loadTemplate('cadastroNovoJogo');
        }
    }
    
    //Função para listar todos jogos salvos pelo usuários
    public function carregarJogosSalvos(){
        
        //Busca todos nomes de campeonato salvos, assim como seus respectivos ids.
        $campeonatoDao = new CampeonatoDAO();
        $jogosSalvos = $campeonatoDao->carregarTodosCarregamentos($_SESSION['idUsuario']);

        $this->loadTemplate('carregamento', $jogosSalvos);
    }
    
    //Função para criar um campeonato novo
    public function gerarCampeonatoNovo(){
        
        $campeonato = new Campeonato(array(
            'nome'=>$_POST['nomeCampeonato'],
            'ano'=>'2018',
            'usuario'=>$_SESSION['idUsuario'],
            'fase'=>'0'
        ));
        $campeonatoDao = new CampeonatoDAO();
        
        //Verifica se já existe algum campeonato com o mesmo nome
        if($campeonatoDao->verificaNome($campeonato)){
            echo "Nome de campeonato já existe";
            $this->loadTemplate('carregamento');
        }
        
        //Cadastra um novo campeonato
        $campeonatoDao->cadastrar($campeonato);
       
        //Buscando o ultimo registro realizado por um usuário
        $idUltimoCampeonato = $campeonatoDao->ultimoRegistroCampeonatoporUsuario($campeonato);
        
        $_SESSION['idCampeonato'] = $idUltimoCampeonato;
        
        //Criando todos times do campeonato
        $timeControle = new TimeControle();
        $timeControle->gerarTimes();        
        
        //Criando todos jogos do campeonato
        $jogoControle = new JogoControle();
        $jogoControle->gerarFaseGrupo();
        
        //Array com todos times disponiveis no campoenato
        $timeDao = new TimeDAO();
        $times = $timeDao->buscarTodosTimesCampeonato($_SESSION['idCampeonato']);
        
        //Carregar tela para selecionar seu time no campeonato
        $this->loadTemplate('selecionarTime', $times);
       
    }
    
    //Após selecionado o time pelo o usuário, ele irá gravar no banco a opção, após entrar no jogo
    public function iniciarCampeonato(){
        //Recebendo id do time selecionado
        $_SESSION['idTime'] = $_POST['time'];
        
        //Cadastrando time do usuário no campeonato
        $timeDao = new TimeDAO();
        $timeDao->atualizarTimeUsuario($_SESSION['idUsuario'],$_SESSION['idTime']);
        
        //buscando dado do time usuário no campeonato
        $timeDao = new TimeDAO();
        $timeUsuario = $timeDao->buscarTimeCampeonato();
        
        //$_SESSION['idTime'] = $timeUsuario[0];
        $_SESSION['nomeTime'] =$timeUsuario[1];
        
        //Carrega Campeonato
        $this->loadTemplateCampeonato('perfil');
        
    }
    
    //Função responsável por carregar dados dos campeonato
    public function carregarCampeonato(){
        
        //identificando campeonato
        $_SESSION['idCampeonato'] = $_POST['campeonato'];
        
        //buscando seu time no campeonato
        $timeDao = new TimeDAO();
        $timeUsuario = $timeDao->buscarTimeCampeonato();
       
        $_SESSION['idTime'] = $timeUsuario[0];
        $_SESSION['nomeTime'] =$timeUsuario[1];
        
        //Carregar tela de layoutCampeonato
        $this->loadTemplateCampeonato('perfil');
        
    }
    
}