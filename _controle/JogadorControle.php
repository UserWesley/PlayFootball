<?php

//Classe de controle do jogador
class JogadorControle extends ControladorVisao{
    
    //Função para gerenciar a criação de jogadores
    public function gerarJogador($idTime){
        
        $jogadorDao = new JogadorDAO();
        
        //Criando a 52 jogadores por time
        for($i = 0; $i<=51 ; $i++){
            
            $jogadorFuncao = new Jogador();
            
            $nome = $jogadorFuncao->listaNome();
            $sobrenome = $jogadorFuncao->listaSobrenome();
            $posicao = $jogadorFuncao->gerarPosicao($i);
            $idade = $jogadorFuncao->gerarIdade();
            $peso = $jogadorFuncao->gerarPeso();
            $altura = $jogadorFuncao->gerarAltura();
            $agilidade = $jogadorFuncao->gerarAgilidade();
            $chute = $jogadorFuncao->gerarChute();
            $forca = $jogadorFuncao->gerarForca();
            $lancamento = $jogadorFuncao->gerarLancamento();
            $pegar = $jogadorFuncao->gerarPegar();
            $marcacao = $jogadorFuncao->gerarMarcacao();
            $resistencia = $jogadorFuncao->gerarResistencia();
            $salto = $jogadorFuncao->gerarSalto();
            $tackle = $jogadorFuncao->gerarTackle();
            $velocidade = $jogadorFuncao->gerarVelocidade();
            
//            echo "<p>Nome : ".$nome." Sobrenome :".$sobrenome." Posição : ".$posicao." Idade : ". $idade." Peso : ".$peso." Altura : ".$altura;
  //          echo "<p>Agilidade : ".$agilidade." Chute : ".$chute." Força : ".$forca." Lançamento : ".$lancamento." Pegar : ".$pegar." Marcacao : ".$marcacao." Resistência :".$resistencia." Salto :".$salto." Velocidade : ".$velocidade." Tackle : ".$tackle;
        
            //Cadastrando o jogador com suas caracteristicas geradas acima
            $novoJogador= new Jogador(array('nome'=>$nome,
                'sobrenome' => $sobrenome,
                'idade' => $idade,
                'peso' => $peso,
                'altura' => $altura,
                'posicao'=> $posicao,
                'agilidade' => $agilidade,
                'chute' => $chute,
                'forca' => $forca,
                'lancamento' => $lancamento,
                'pegar' => $pegar,
                'marcacao' => $marcacao,
                'resistencia' => $resistencia,
                'salto' => $salto,
                'tackle' => $tackle,
                'velocidade' => $velocidade,
                'time'=>$idTime,
                'campeonato'=> $_SESSION['idCampeonato']
                ));
    
            $jogadorDao->cadastrar($novoJogador);
        }
    }   
}