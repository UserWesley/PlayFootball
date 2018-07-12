<html>
	<head>
		<title>Futebol Americano</title>
	</head>
	<body>
	<a href="<?php echo BASE_URL; ?>">Futebol Americano</a>
		<?php if(isset($_SESSION['login'])) { ?><p>
			<?php echo "Usuário : ".$_SESSION['login']; ?>
			<a href="<?php echo BASE_URL; ?>InicioControle/deslogar">Sair</a>
		<?php } ?>
			
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		<p>
		rodapé
	</body>
</html>