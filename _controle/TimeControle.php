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
        
        //Instanciar timeDao para acessar metodo cadastrar em operações abaixo
        $timeDao = new TimeDAO();
        
        //nome dos time
        $dadosTime = new Time();
        $nomesTime = $dadosTime->nomeTime();
        
        //Criando 16 Time para o campeonato
        for($i=1;$i<=16;$i++){
            
            //Cadastrando os grupos
            $grupo = $dadosTime->definirGrupo($i);
            
            //atributos iniciais
            $torcida = 1000;
            $dinheiro = 10000;
            $patrocinio = 10000;
            
            //Sorteando nome e após removendo, para que não haja dois times com os nomes iguais
            $nome = $dadosTime->sorteaNomeTime($nomesTime);
            unset($nomesTime[$nome[0]]);
            
            //Cadastrando time com os dados
            $time = new Time(array(
                'nome'=>$nome[1],
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