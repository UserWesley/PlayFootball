<div class="container">
	<div class="fundoSelecionaTime">
		<h1>Selecione Seu Time</h1>
        <?php echo "Usuário : ".$_SESSION['login']; ?>
        <a href="<?php echo BASE_URL; ?>InicioControle/deslogar">Sair</a>
        <p>
        <hr>
        <form method="POST" action="<?php echo BASE_URL; ?>CampeonatoControle/iniciarCampeonato">
        	<h2>Times Disponíveis</h2>
        	
            <select name="time">
				
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
            		<audio controls autoplay loop  >
          				<source src="../_outros/_musicas/bensound-happyrock.mp3" type="audio/mpeg">
        			</audio>
    			</div>
    			<hr>
				Instituto Federal São Paulo <br>Câmpus Hortolândia
			</div>
		</div>
        	
	</div>
</div>