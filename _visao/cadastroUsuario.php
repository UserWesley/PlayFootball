<div class="container">
	<div class="fundoCadastroUsuario">
        <form method="post" action= "<?php echo BASE_URL; ?>InicioControle/cadastrarUsuario">
         <p><p>
        	<h1 class="titulo">Cadastro Novo Usuário</h1>
        	<hr>

        	<label for="nome">Nome:</label>
        	<input type="text" name="nome" id="nome" placeholder="Digite seu nome"/>
        	<br>
        	<label for="sobrenome">Sobrenome:</label>
        	<input type="text" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome"/>
        	<br>
        	<label for="email">E-mail:</label>
        	<input type="email" name="email" id="email" placeholder="Digite seu e-mail"/>
        	<br>
        	<label for="login">Login:</label>
        	<input type="text" name="login" id="login" placeholder="Digite seu login"/>
        	<br>
        	<label for="senha">Senha:</label>
        	<input type="password" name="senha" id="senha" placeholder="Digite sua senha"/>
        	<br>
        	<label for="confirmasenha">Confirmar Senha:</label>
        	<input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme seu senha" />
        	<p><p>
        	<button type="submit" class="btn btn-primary">Cadastrar</button>
        	<a href="<?php echo BASE_URL; ?>InicioControle/">Voltar ao Início</a>
        	<hr>
        	<div class="audio">
            	<audio controls autoplay loop >
          			<source src="../_outros/_musicas/bensound-hey.mp3" type="audio/mpeg">
        		</audio>
    		</div>
        </form>
        	
	</div>
</div>