
<form method="GET" action="<?php echo BASE_URL; ?>InicioControle/validaLogon">
<p><p>
	<label for="login">Login:</label>
	<input type="text" name="login" id="login" />
	<br>
	<label for="senha">Senha:</label>
	<input type="password" name="senha" id="senha" />
	<br>
	<input type="submit" value="Entrar" />
</form>

	<a href="<?php echo BASE_URL; ?>InicioControle/cadastroUsuario">Cadastre-se</a>