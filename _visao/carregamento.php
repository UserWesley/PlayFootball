<div class="container">
	<div class="fundoCarregamento">
        
        <h1>Carregamento</h1>
        <?php echo "Usuário : ".$_SESSION['login']; ?>
        <a href="<?php echo BASE_URL; ?>InicioControle/deslogar">Sair</a>
        <p>
        <hr>
        <form method="POST" action="<?php echo BASE_URL; ?>CampeonatoControle/gerarCampeonatoNovo">
    		<p><p>
    		<label for="nomeCampeonato">Novo Campeonato:</label><br>
   	 		<input type="text" name="nomeCampeonato" id="nomeCampeonato" class="form-control" placeholder="Digite um nome para identificar o campeonato " />
    		<br>
   		 	<button type="submit" class="btn btn-primary" style="width:250px;">Novo Campeonato</button>
		</form>
        <p>
        <hr>
        
        <form method="POST" action="<?php echo BASE_URL; ?>CampeonatoControle/carregarCampeonato">
        	<h2>Campeonatos Salvos</h2>
        	
            <select name="campeonato">
				
               <?php  
                    foreach($viewData as $key => $value){
                        echo '<option value="'.$key.'">'.$value.'</option>'; 
                    }
                ?>
            </select>
            																		
            <button type="submit" class="btn btn-primary" style="width:250px;">Carregar Jogo Selecionado</button>						
		</form>
		
		<hr>
    	<div class="col">
			<div class="rol">
				<div class="audio">
            		<audio controls autoplay loop>
          				<source src="../_outros/_musicas/bensound-happiness.mp3" type="audio/mpeg">
        			</audio>
    			</div>
    			<hr>
				Instituto Federal São Paulo <br>Câmpus Hortolândia
			</div>
		</div>
		
	</div>
</div>