<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no"/>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>_outros/_css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>_outros/_css/estiloMenuCampeonato.css" />
		<title>Futebol Americano</title>
		
	</head>
	<body>							   
	<button class="btn" id="botaoMenu" onclick="aparecerMenu('menu','conteudo','botaoMenu')"><<<</button>
        <nav class="nav flex-column" id="menu" style="display: inline-block;">
          <div class="row">         
          	<b>Futebol Americano</b> 
          </div>
          <hr>
          <a class="nav-link active" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaPerfil"><img src="../_outros/_imagens/person.svg">Perfil</a>
          <hr>
          <li class="nav-item dropdown">
    		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="../_outros/_imagens/organization.svg">Meu Time</a>
    			<div class="dropdown-menu">
    			  <a class="dropdown-item" href="#">Calendário</a>
    			  <a class="dropdown-item" href="#">Comissão Técnica</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaDadosTime">Dados</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaMeusJogadores">Meus Jogadores</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaMinhaFinanca">Finanças</a>
                  <a class="dropdown-item" href="#">Estádio</a>
                  <a class="dropdown-item" href="#">Patrocínio</a>
                </div>
          </li>
          <hr>
           <li class="nav-item dropdown">
    		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="../_outros/_imagens/tools.svg">Campeonato</a>
              			<div class="dropdown-menu">
    			  <a class="dropdown-item" href="#">Calendário</a>
    			  <a class="dropdown-item" href="#">Eliminatórias</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaFaseGrupo">Grupos</a>
                  <a class="dropdown-item" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaJogoGrupo">Jogos</a>
                  <a class="dropdown-item" href="#">Times</a>
                </div>
          </li>
          <hr>
          <li class="nav-item dropdown">
    		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="../_outros/_imagens/graph.svg">Estatísticas</a>
    			<div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><span></span>Times</a>
                  <a class="dropdown-item" href="#">Jogadores</a>
                  
                </div>
          </li>
          
          <hr>
          <a class="nav-link active" href="<?php echo BASE_URL; ?>MenuCampeonatoControle/carregarTelaProximoJogo"><img src="../_outros/_imagens/arrow-right.svg">Jogar</a>
          <hr>														
          <p>
          <a class="nav-link" href="<?php echo BASE_URL; ?>InicioControle/deslogar"><img src="../_outros/_imagens/sign-out.svg">Sair</a>
          		
        </nav>
		<div class="conteudo" id="conteudo">
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</div>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>_outros/_js/scriptCampeonato.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>_outros/_js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>_outros/_js/bootstrap.bundle.min.js"></script>
		

	</body>
</html>
