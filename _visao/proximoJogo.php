<div class="container-fluid">
    <h1>Próximo Confronto</h1>
    <h2>Fase de Grupo - Rodada <?php echo $_SESSION["rodada"]?></h2> 
    <h2>Jogo</h2>
    <div class="table-responsive">
        <table class="table">
        	<thead>
                <tr class = "info">
                    <th>Time Casa</th>
                    <th>Time Visitante</th>
            	</tr>
        	</thead>
        	<tbody>
        	<?php
        	    $colunas = 2;
                for($i=0; $i < count($viewData); $i++) {
                    if($viewData[$i] == $_SESSION['nomeTime']){
                    echo "<td style=\"color:blue;\">".$viewData[$i]."</td>";
                    }
                    else{
                        echo "<td>".$viewData[$i]."</td>";
                    }
                    if((($i+1) % $colunas) == 0 )
                        echo "</tr><tr>";
                }
            ?>
    		</tbody>
    	</table>
    </div> 
    <div class="divBotao">
	    <a href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaSorteioInicio"><button class="botaoJogar">JOGAR</button></a>
   	</div>
   	
</div>