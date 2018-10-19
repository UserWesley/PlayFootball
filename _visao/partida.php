
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<?php if ($_SESSION['timeCasa'] == $_SESSION['nomeTime']){ ?>
			    <div class="timeCasa" style="color:blue;">
			<?php } else {?>
            <div class="timeCasa"> <?php }?>
            	<h4>Time Casa: </h4><h1><?php echo $_SESSION['timeCasa'];?></h1>
				<div class="placar">
					<?php echo $_SESSION['placarCasa'];?>
        		</div>
        	</div>
    	</div>
    	      
    	<div class="col">
        	<div class="centro">
            	<div class= "informacoes">
                	<div class="tituloInformacoes">
                		<b><span class="tituloInfomacoes">Dados da Partida   </span></b><span class="rodada">  Rodada : <?php echo $_SESSION['rodada'];?></span>
                	
                	</div>
                	<hr>
                	<div class="dadosPartida">
                	
                    	<table class="table table-hover table-dark">
                          <thead>
                            <tr>
                            	<th scope="col">Período</th>
                                <th scope="col">Tempo</th>
                                <th scope="col">Decida</th>
                                <th scope="col">Posição da Bola</th>
                                <th scope="col">Jardas EndZone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>  
                            	<th><?php echo $viewData[0];?>/4</th>
                                <th><?php echo $_SESSION['tempo'];?></th>
                                <th><?php echo $_SESSION['decida'];?></th>
                                <th><?php echo $_SESSION['posicaoBola'];?></th>
                                <th><?php echo $viewData[2];?></th>
                            </tr>
                          </tbody>
                        </table>
                	</div>
                	
            	</div>
            	<p>
            	<hr>
            	<div class="campo">
            		 <img src="<?php echo BASE_URL; ?>_outros/_imagens/campo.png" alt="campo" height="150" width="500">  	
                </div>
                <hr>
                <?php /*if($_SESSION['decida'] > 10){
                        $_SESSION['decida'] = 0;
            		    //Kickoff Retorno de kickoff
            		    if($_SESSION['acao'] == "Atacar"){
            		        $_SESSION['acao'] = "Kickoff";
            		        
            		    }else if($_SESSION['acao'] == "Defender") {
            		        $_SESSION['acao'] = "Retorno Kickoff";
            		    }
            		    
            		  }*/
            	?>
                <div class="jogada">
            		<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg"><?php echo $_SESSION['acao'];?></button>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        	<div class="modal-header">
                        		<h1 class="modal-title" id="exampleModalLongTitle">Jogada</h1>
                        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          			<span aria-hidden="true">&times;</span>
                        		</button>
                      		</div>
                           
                          		<form action="<?php echo BASE_URL; ?>PartidaControle/analisarJogada">
							  		
							  		<?php if($_SESSION['acao'] == "Atacar") {?>
                                    
                                        Selecione sua Formação:
                                        <select name="formacao">
                                        	<option value="I">I</option>
                                        	<option value="Shotgun">Shotgun</option>
                                        </select>
                                        <br>
                                        Selecione sua Estratégia: 
                                        <select name="estrategia">
                                        	<option value="Corrida">Corrida</option>
                                        	<option value="Lancamento">Lançamento</option>
                                        </select>
                                        <br>
                                        Selecione sua Estratégia linha: 
                                        <select name="linha">
                                        	<option value="Avancar">Avançar</option>
                                        	<option value="Bloquear">Bloquear</option>
                                        </select>
                                         
                                        <br>
                                        Informe sua escalação: <input name="escalacao" type="text"/> 
                                        <br>
                                    
                                    <?php }else if($_SESSION['acao'] == "Defender"){?>
                                    
                                    	Selecione sua Formação:
                                        <select name="formacao">
                                        	<option>4-3</option>
                                        	<option>3-4</option>
                                        </select>
                                        <br>
                                        Selecione sua Estratégia: 
                                        <select name="estrategia">
                                        	<option>Blitz Forte</option>
                                        	<option>Blitz Fraca</option>
                                        </select>    
 										<br>
 										Selecione sua Marcação: 
                                        <select name="marcacao">
                                        	<option>Zona</option>
                                        	<option>Man-to-man</option>
                                        </select>    
                                        <br>
                                        Informe sua escalação: <input name="escalacao" type="text"/> 
                                        <br>
                                    
                                    <?php }else {?>
                                    Informe sua escalação: <input name="escalacao" type="text"/> 
                                        <br>
                                    <?php }?>
                              		<button type="submit"id="jogada" class="btn btn-success">Jogar</button>      
                                    <hr>
                                    <h5>Jogadores do meu Time </h5>

                                      <div class="table-responsive">
                                        <table class="table" id="tabelaJogadores">
                                        	<thead>
                                                <tr class = "info">
                                                	<th>id</th>
                                                    <th>Nome</th>
                                                    <th>Sobrenome</th>
                                                    <th>Idade</th>
                                                    <th>Peso</th>
                                                    <th>Altura</th>
                                                    <th>Posição</th>
                                                    <th>Agilidade</th>
                                                    <th>Chute</th>
                                                    <th>Força</th>
                                            		<th>Lançamento</th>
                                                    <th>Pegar</th>
                                                    <th>Marcacao</th>
                                                    <th>Resistência</th>
                                                    <th>Salto</th>
                                                    <th>Tackle</th>
                                                    <th>Velocidade</th>
                                            	</tr>
                                            <!--  	<tr>
                                            		<th><input type="text" id="id"/></th>
                                                    <th><input type="text" id="nome"/></th>
                                            		<th><input type="text" id="sobrenome"/></th>
                                                    <th><input type="text" id="idade"/></th>
                                                    <th><input type="text" id="peso"/></th>
                                                    <th><input type="text" id="altura"/></th>
                                                    <th><input type="text" id="posicao"/></th>
                                                    <th><input type="text" id="agilidade"/></th>
                                                    <th><input type="text" id="chute"/></th>
                                                    <th><input type="text" id="forca"/></th>
                                                    <th><input type="text" id="lancamento"/></th>
                                                    <th><input type="text" id="pegar"/></th>
                                                    <th><input type="text" id="marcacao"/></th>
                                                    <th><input type="text" id="resistencia"/></th>
                                                    <th><input type="text" id="salto"/></th>
                                                    <th><input type="text" id="tackle"/></th>
                                                    <th><input type="text" id="velocidade"/></th>
                                                </tr> --> 
                                    
                                        	</thead>
                                        	<tbody>
                                    
                                    <?php
                                    $colunas = 17;
                                    $jogadores = $viewData[4];
                                    for($i=0; $i < count($jogadores); $i++) {
                                        echo "<td>".$jogadores[$i]."</td>";
                                        if((($i+1) % $colunas) == 0 )
                                            echo "</tr><tr>";
                                    }
                                    ?>      
                                        	</tbody>
                                    	</table>
                            </div>
                               
                          </form>
                        </div>
                      </div>
                    </div>
            	</div>
                
            	<hr>
            	<div class="acontecimentos">
            		<div class="titulo">
            			<b>Acontecimentos</b>
            		</div>
            	
            		<table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Tempo</th>
                          <th scope="col">Evento</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         
                          <td><?php echo $_SESSION['tempo'];?></td>
                          <td><?php echo $viewData[1];?></td>
                          
                        </tr>
                        
                        <?php if(!empty($viewData[3])){
                                echo "<tr>";
                                echo "<td>".$_SESSION['tempo']."</td>";
            			        echo "<td>".$viewData[3]."</td>";
            			        echo "<tr>";
            			        
                        }?>
            			<tr>
            			
                        <?php if(!empty($viewData[5])){
                                echo"<td>".$_SESSION['tempo']."</td>";
                                echo"<td>".$viewData[5]."</td>";
                        }?>
                        </tr>
                      </tbody>
                    </table>
               </div>
        	</div>

        	<!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Todos Acontecimentos
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Todos Acontecimentos da Partida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php
                    
                    foreach($_SESSION['acontecimento'] as $key)
                        echo $key.'<br>';
                     
                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        
    	<div class="col">
    	<?php if ($_SESSION['timeVisitante'] == $_SESSION['nomeTime']){ ?>
        	<div class="timeVisitante" style="color:blue;">
        <?php }else {?>
        <div class="timeVisitante">
        <?php } ?>
        		Time Visitante :  <h1><?php echo $_SESSION['timeVisitante'];?></h1>
        		<div class="placar">
					<?php echo $_SESSION['placarVisitante']?>
        		</div>
    		</div>
		</div>
	</div>
</div>
