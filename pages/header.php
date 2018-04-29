<?php require 'config.php';?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alug</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
	<nav class="navbar navbar-default bg-primary">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./" class="navbar-brand">alug</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                    <li><a href="../meus-anuncios.php">Meus Anúncios</a></li>
                    <li><a href="../sair.php">Sair</a></li>
                <?php else: ?>
                    <li><a href="../login.php">Login</a></li>
                <?php endif; ?>
			</ul>
		</div>
	</nav>