<form method="GET" action= "<?php echo BASE_URL; ?>InicioControle/cadastrarUsuario">
 <p><p>
	<h1>Cadastro Novo Usuário</h1>
	<br>
	<label for="nome">Nome:</label>
	<input type="text" name="nome" id="nome" />
	<br>
	<label for="sobrenome">Sobrenome:</label>
	<input type="text" name="sobrenome" id="sobrenome" />
	<br>
	<label for="email">E-mail:</label>
	<input type="email" name="email" id="email" />
	<br>
	<label for="login">Login:</label>
	<input type="text" name="login" id="login" />
	<br>
	<label for="senha">Senha:</label>
	<input type="password" name="senha" id="senha" />
	<br>
	<label for="confirmasenha">Confirmar Senha:</label>
	<input type="password" name="confirmaSenha" id="confirmaSenha" />
	<br>
	<input type="submit" value="Cadastrar" />
</form>
	<a href="<?php echo BASE_URL; ?>">Inicio</a>