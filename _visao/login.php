
<button type="button" id="botaoJogar" class="botao" onclick="aparecerLogin('login','botaoJogar')">INICIAR</button>

<div class="container">

	<div class="fundoLogin" id="login" style="display: none;">	
		<form method="post" action="<?php echo BASE_URL; ?>InicioControle/validaLogon">
			<div class="col">
				<div class="rol">
					<h1>Futebol Americano</h1>
						<hr>
				</div>
			</div>
    		<div class="form-group">
    			<input type="text" class="form-control" name="login" placeholder="Digite o Usuário">
    		</div>
    		<div class="form-group">
    			<input type="password" class="form-control" name="senha" placeholder="Digite a Senha">
    		</div>
    		<div class="col">
				<div class="rol">
					<button type="submit" class="btn btn-primary">Entrar</button>
					<a href="<?php echo BASE_URL; ?>InicioControle/cadastroUsuario">Cadastre-se</a>
				</div>
			</div>
				<hr>
    			<div class="col">
					<div class="rol">
					
    					<audio controls autoplay loop >
      						<source src="<?php echo BASE_URL; ?>_outros/_musicas/bensound-happyrock.mp3" type="audio/mpeg">
    					</audio>
    					<hr>
						Instituto Federal São Paulo <br>Câmpus Hortolândia
					</div>
				</div>
		</form>
	</div>
</div>
