<?php

//Classe que analisará o resultado e as variáveis da jogada 
class AnalisadorJogadas{
    
    //função que analisa o kickoff
    public function kickoff($dados,$acao){
        
        //Definindo quem chute quem retorna com a bola
        if($acao == 1){
            $timeChute = $_SESSION['nomeTime'];
            $timeRetorno = $_SESSION['timeAdversario'];
            //Habilidade de ambos time
            $kickoffChute = $dados[0];
            $kickoffRetorno = $dados[1];
        
        }else {
            $timeRetorno = $_SESSION['nomeTime'];
            $timeChute = $_SESSION['timeAdversario'];
            //Habilidade de ambos time
            $kickoffChute = $dados[1];
            $kickoffRetorno = $dados[0];
        }
        
        //Número para avaliação da jogada
        $min = 0;
        $max = $kickoffChute+$kickoffRetorno;
        
        //Sorteando um numero entre os estabelecido
        $resultado = mt_rand($min ,$max);
        
        //Dados para analise Positivo ataque
        $kickoffChute2 = $kickoffChute + ($kickoffChute/2);
        $kickoffChute3 = $kickoffChute + ($kickoffChute/3);
        $kickoffChute4 = $kickoffChute + ($kickoffChute/4);
        $kickoffChute5 = $kickoffChute + ($kickoffChute/5);
        
        //Dados Para analise negativo
        $kickoffChute6 = $kickoffChute - ($kickoffChute/2);
        $kickoffChute7 = $kickoffChute - ($kickoffChute/3);
        $kickoffChute8 = $kickoffChute - ($kickoffChute/4);
        
        /*
        // Testes de jogadas
        //Número para avaliação da jogada
        $min = 0;
        $max = $kickoffChute+$kickoffRetorno;
        
        
        //Sorteando um numero entre os estabelecido
        echo "Kickoff Chute: ".$kickoffChute;
        echo " Kickoff Retorno: ".$kickoffRetorno;
        echo " Resultado : ".$resultado = 5500;//mt_rand($min ,$max);
        $maximo = $kickoffChute + $kickoffRetorno;
        echo " Número maximo: ".$maximo;
            
        //Dados para analise Positivo ataque
        echo "<br>Kickoff 2: ".$kickoffChute2 = $kickoffChute + ($kickoffChute/2);
        echo "<br>Kickoff 3: ".$kickoffChute3 = $kickoffChute + ($kickoffChute/3);
        echo "<br>Kickoff 4: ".$kickoffChute4 = $kickoffChute + ($kickoffChute/4);
        echo "<br>Kickoff 5: ".$kickoffChute5 = $kickoffChute + ($kickoffChute/5);
        
        //Dados Para analise negativo
        echo "<br>Kickoff 6: ".$kickoffChute6 = $kickoffChute - ($kickoffChute/2);
        echo "<br>Kickoff 7: ".$kickoffChute7 = $kickoffChute - ($kickoffChute/3);
        echo "<br>Kickoff 8: ".$kickoffChute8 = $kickoffChute - ($kickoffChute/4);
        */
        
        //Situações de jogo
        //touchdown
        if(($resultado >= $kickoffChute5) && ($resultado < $kickoffChute4)){
            
            $avanco= 100;
            $tempo = 0.40;
            $acontecido = "O time ".$timeRetorno. " marcou touchdown Impressionante! ";
            $proximaJogadaTimeChuta = 2;
            $proximaJogadaTimeRetorna = 1;
            
        }
        //Avanço Medio
        else if(($resultado >= $kickoffChute4) && ($resultado < $kickoffChute3)){
            
            $min = 20;
            $max = 40;
            
            $avanco = mt_rand($min ,$max);

            $tempo = 0.20;
            $acontecido = "O time ".$timeRetorno. " avançou ".$avanco." jardas";
            $proximaJogadaTimeChuta = 5;
            $proximaJogadaTimeRetorna = 4;
            
        }
        //Avanço longo
        else if(($resultado >= $kickoffChute3) && ($resultado < $kickoffChute2)){
            
            $min = 40;
            $max = 100;
            
            $avanco = mt_rand($min ,$max);
            
            $tempo = 0.25;
            $acontecido = "O time ".$timeRetorno. " avançou ".$avanco." jardas";
            $proximaJogadaTimeChuta = 5;
            $proximaJogadaTimeRetorna = 4;
            
        }
        //Avanço curto
        else if($resultado >= $kickoffChute2){
            $min = 0;
            $max = 20;
            
            $avanco = mt_rand($min ,$max);
            
            $tempo = 0.10;
            $acontecido = "O time ".$timeRetorno. " avançou ".$avanco." jardas";
            $proximaJogadaTimeChuta = 5;
            $proximaJogadaTimeRetorna = 4;
            
            
        }
        //Touchdown adversario
        else if (($resultado >= $kickoffChute7) && ($resultado < $kickoffChute8)){
            $avanco = -100;
            $tempo = 0.30;
            $acontecido = "Fumble e TOUCHDOWN para o time ".$timeChute." que chutou a bola !!";
            $proximaJogadaTimeChuta = 1;
            $proximaJogadaTimeRetorna = 2;
            
        //posse de bola adversario
        }else if(($resultado >= $kickoffChute6) && ($resultado < $kickoffChute7)){
            $avanco = 0;
            $tempo = 0.12;
            $acontecido = "Fumble e posse de bola para o time ".$timeChute." !!!";
            $proximaJogadaTimeChuta = 2;
            $proximaJogadaTimeRetorna = 1;
        
        //Tomada de tackle
        }else {
            $avanco = 0;
            $tempo = 0.30;
            $acontecido = "uhhh- JOGADOR do time ".$timeRetorno." nem movimentou e levou um tackle !!!";
            $proximaJogadaTimeChuta = 5;
            $proximaJogadaTimeRetorna = 4;
            
        }
        
        //dados para serem enviados por array
        $dadosAnalise[] = $avanco;
        $dadosAnalise[] = $tempo;
        $dadosAnalise[] = $acontecido;
        $dadosAnalise[] = $proximaJogadaTimeChuta;
        $dadosAnalise[] = $proximaJogadaTimeRetorna;
        
        return $dadosAnalise;
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    //função que analisa o atacar
    public function atacarxDefender($dados,$acao,$formacao,$estrategia,$linha,$marcacao){
        
        //Analisando o dados de qual formação ganha mais probabilidades
        $chancesJogadaAtaque=0;
        $chancesJogadaDefesa=0;
        
        //Definindo quem chuta e quem retorna com a bola
        if($acao == 5){
            $timeDefende = $_SESSION['nomeTime'];
            $timeAtaca = $_SESSION['timeAdversario'];
            
            //Habilidade de ambos time
            $habilidadesTimeDefesa = $dados[0];
            $habilidadesTimeAtaque = $dados[1];
            
            //definindo jogada usuário
            $formacaoDefesa=$formacao;
            $estrategiaDefesa=$estrategia;
            $marcacaoDefesa=$marcacao;
            
            //formacao adversaria
            $formacaoAtaque = "I";
            $estrategiaAtaque = "Corrida";
            $linhaAtaque = "Avancar";
            
        }else {
            $timeAtaca = $_SESSION['nomeTime'];
            $timeDefende = $_SESSION['timeAdversario'];
            
            //Habilidade de ambos time
            $habilidadesTimeDefesa = $dados[1];
            $habilidadesTimeAtaque = $dados[0];
            
            //definindo jogada Usuário
            $formacaoAtaque=$formacao;
            $estrategiaAtaque=$estrategia;
            $linhaAtaque=$linha;
            
            //Definindo dados adversários
            $formacaoDefesa = "3-4";
            $estrategiaDefesa = "Blitz Fraca";
            $marcacaoDefesa = "Zona";
        }
               
        //analisando formacao
        if($formacaoAtaque == "I"){
            if(($formacaoAtaque == "I") && ($formacaoDefesa == "3-4")){
                $chancesJogadaAtaque++;
            }else{
                $chancesJogadaDefesa++;
            }
        }
        if($formacaoAtaque == "Shotgun"){
            if(($formacaoAtaque == "Shotgun") && ($formacaoDefesa == "3-4")){
                $chancesJogadaDefesa++;
            }else{
                $chancesJogadaAtaque++;
            }
        }
        
        //analisando estrategia e marcacao
        if($estrategiaAtaque == "Corrida"){
            if(($estrategiaAtaque == "Corrida") && ($marcacaoDefesa == "Zona")){
                $chancesJogadaAtaque++;
            }else{
                $chancesJogadaDefesa++;
            }
        }
        
        if($estrategiaAtaque == "Lancamento"){
            if(($estrategiaAtaque == "Lancamento") && ($marcacaoDefesa == "Zona")){
                $chancesJogadaDefesa++;
            }else{
                $chancesJogadaAtaque++;
            }
        }
        
        //analisando linha e estrategia
        if($linhaAtaque == "Avancar"){
            if(($linhaAtaque == "Avancar") && ($estrategiaDefesa == "Blitz Fraca")){
                $chancesJogadaAtaque++;
            }else{
                $chancesJogadaDefesa++;
            }
        }
        
        if($linhaAtaque == "Bloquear"){
            if(($linhaAtaque == "Bloquear") && ($estrategiaDefesa == "Blitz Fraca")){
                $chancesJogadaDefesa++;
            }else{
                $chancesJogadaAtaque++;
            }
        }
        
        //Resumindo 
        //FormaçãoAtaque x FormaçãoDefesa  I > 3-4 shotgun < 3-4 
        //
        /*
        echo "<p>Chances Ataque: ".$chancesJogadaAtaque;
        echo "<br>Chances Defesa: ".$chancesJogadaDefesa;
        
        echo "<br>Formação Ataque: ".$formacao;
        echo "<br>Estratégia Ataque: ".$estrategia;
        echo "<br>Linha: ".$linha;
        
        echo "<br>Formação defesa: ".$formacaoDefesa;
        echo "<br>Estrategia defesa: ".$estrategiaDefesa;
        echo "<br>Marcacao defesa:".$marcacaoDefesa;
        */
        //echo "<br>Marcação".$marcacao;
        
        //Sorteio do número para gerar um ação
        $min = 0;
        $max = $habilidadesTimeDefesa+$habilidadesTimeAtaque;
        
        //echo "<br> Habilidade Time Ataque".$habilidadesTimeAtaque;
        //echo "<br> Habilidade Time Defesa".$habilidadesTimeDefesa;
        //echo "<br> Maximo: ".$max;
        
        $numero = mt_rand($min ,$max);
        //$chancesJogadaAtaque=3;
        //$numero = 9000;
        //echo "<br>Numero Gerado: ".$numero;
        
        
        //Dados Analise
        $ponto1 = $habilidadesTimeDefesa + ($habilidadesTimeDefesa/2);
        $ponto2 = $habilidadesTimeDefesa + ($habilidadesTimeDefesa/3);
        
        //Analisar jogadas //Fumble, SAC//Avanço 0
        if($chancesJogadaAtaque == 0){
               
            //Fumble
            if($numero >= $ponto1){
                    
                $tempo = 0.05;
                $avanco = 0;
                $acontecido = "O time ".$timeDefende." realizou um Fumble no adversário e recuperou a bola!";
                $proximaJogadaTimeAtaque = 1;
                $proximaJogadaTimeDefesa = 2;
                $_SESSION['decida']=0;
                
            //SAC    
            }else if(($numero>$habilidadesTimeDefesa) && ($numero <= $ponto1)){
                
                $tempo = 0.05;
                $avanco = 0;
                $acontecido = "O time ".$timeDefende." realizou um SAC no adversário!";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            //Avanço de 0 jardas    
            }else {
                
                $tempo = 0.05;
                $avanco = 0;
                $acontecido = "O time ".$timeAtaca." não conseguiu avançar nenhuma jarda!";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            }
            
        //Avanço de 0 jardas, Avanço de 2 jardas
        }else if($chancesJogadaAtaque == 1){
            
            //Avanço 0 de jardas
            if($numero<$habilidadesTimeDefesa){
                
                $tempo = 0.05;
                $avanco = 0;
                $acontecido = "O time ".$timeAtaca." não conseguiu avançar nenhuma jarda!";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            //Avanço de 2 jardas
            }else {
                
                $tempo = 0.07;
                $avanco = 2;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar 2 jardas!";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            }
            
        
        //Interceptação //Avanço medio
        }else if($chancesJogadaAtaque ==2){
            
            //Interceptação
            
            if(($numero<($habilidadesTimeDefesa/2)) && ($estrategia =="Lancamento")){
                $tempo = 0.12;
                $avanco = 0;
                $acontecido = "O time ".$timeDefende." interceptou a bola uau!";
                $proximaJogadaTimeAtaque = 1;
                $proximaJogadaTimeDefesa = 2;
                $_SESSION['decida']=0;
            }   
            
            //Avanço curto
            else if(($numero>$habilidadesTimeDefesa) && ($numero<$ponto1)){
                $min = 2;
                $max = 10;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.15;
                $avanco;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
                
            //Avanço medio
            }else {
                
                $min = 10;
                $max = 20;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.15;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            }
        
        //Avanço longo
        }else if($chancesJogadaAtaque ==3){
            //touchdown, avanço grande
            
            //Avanp curto
            if($numero<($habilidadesTimeDefesa/2)){
                $min = 0;
                $max = 8;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.08;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
                
                //Avanço medio
            }else if(($numero>($habilidadesTimeDefesa/2)) &&($numero<$habilidadesTimeDefesa)){
                $min = 8;
                $max = 20;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.15;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
                
                //Avanço medio - longo
            }else if (($numero > $habilidadesTimeDefesa) && ($numero<($ponto1))){
                
                $min = 20;
                $max = 40;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.20;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
                
                //Avanço longo
            }else {
                $min = 40;
                $max = 100;
                
                $avanco = mt_rand($min ,$max);
                $tempo = 0.35;
                $acontecido = "O time ".$timeAtaca." conseguiu avançar ".$avanco." de jardas !";
                $proximaJogadaTimeAtaque = 4;
                $proximaJogadaTimeDefesa = 5;
                $_SESSION['decida']++;
            }
        }
        
        //Remetendo os dados para analise
        $dadosAnalise[] = $avanco;
        $dadosAnalise[] = $tempo;
        $dadosAnalise[] = $acontecido;
        $dadosAnalise[] = $proximaJogadaTimeDefesa;
        $dadosAnalise[] = $proximaJogadaTimeAtaque;
        
        return $dadosAnalise;
    }
}