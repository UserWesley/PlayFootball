<?php

//Classe de controle do campeonato
class CampeonatoControle extends ControladorVisao {
    
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

        $campeonatoDao = new CampeonatoDAO();
        $jogosSalvos = $campeonatoDao->carregarTodosCarregamentos($_SESSION['idUsuario']);

        $this->loadTemplate('carregamento', $jogosSalvos);
    }
    
    //Função para criar um campeonato novo
    public function gerarCampeonatoNovo(){
        
        $campeonato = new Campeonato(array(
            'nome'=>$_GET['nomeCampeonato'],
            'ano'=>'2018',
            'usuario'=>$_SESSION['idUsuario'],
            'fase'=>'0'
        ));
        $campeonatoDao = new CampeonatoDAO();
        
        if($campeonatoDao->verificaNome($campeonato)){
            echo "Nome de campeonato já existe";
        }
        
        $campeonatoDao->cadastrar($campeonato);
        
        //Buscando o ultimo registro realizado por um usuário
        $idUltimoCampeonato = $campeonatoDao->ultimoRegistroCampeonatoporUsuario($campeonato);
        
        $_SESSION['idCampeonato'] = $idUltimoCampeonato;
        
        $timeControle = new TimeControle();
        $timeControle->gerarTimes();        
        
        $this->loadTemplate('telaTeste');
       
    }
        
}