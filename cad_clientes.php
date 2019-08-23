<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM Cliente";
	$resultado = $conexao->query($sql);

	$clientes = $resultado->fetchAll();

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Cadastro de Clientes - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
	</header>
	<div id="container">
		<main>
			<h2> Cadastro de Clientes</h2>
			<form action="post">
				<p>CPF</p>
				<input type="number" name="CPF">
				<p>Nome</p>
				<input type="Name" name="Nome">
				<p>Data Nascimento</p>
				<input type="date" name="Nascimento">
				<p><button type= "submit">Salvar</button></p>
			</form>
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>