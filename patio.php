<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM patio";
	$resultado = $conexao->query($sql);

	$patio = $resultado->fetchAll();
	$mensagem = "";
	if (isset($_COOKIE['mensagem']))
	{
		$mensagem = $_COOKIE['mensagem'];

		// depois que exibo a mensagem, devo retirá-la
		// dos cookies.
		setcookie('mensagem', '', 1);}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Patio - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patio.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<?php if(!empty($mensagem)): ?>
				<div id="mensagem">
					<?= $mensagem; ?>
				</div>
			<?php endif; ?>

			<h2>Patio</h2>
			<a href="cad_patios.php">Cadastrar Novo Pátio</a>
			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Número </th>
							<th>Endereço</th>
							<th>Capacidade</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($patio as $patio): ?>
						<tr>
							<td><?= $patio['num'] ?></td>
							<td><?= $patio['ender'] ?></td>
							<td><?= $patio['capacidade'] ?></td>
							
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>