<div class="container-fluid">
	<div class="row">
		<div class="col">
			<?php if ($_SESSION['timeCasa'] == $_SESSION['nomeTime']){ ?>
			    <div class="timeCasa" style="color:blue;">
			<?php } else {?>
            <div class="timeCasa"> <?php }?>
            	<h4>Time Casa : </h4><h1><?php echo $_SESSION['timeCasa'];?></h1>
				<div class="placar">
					<?php echo $_SESSION['placarCasa'];?>
        		</div>
        	</div>
    	</div>
    	
    	<div class="col">
            <a href="<?php echo BASE_URL; ?>CampeonatoControle/carregarCampeonato">Voltar</a>
			Fim de partida !
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