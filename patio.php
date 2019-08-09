<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM patio";
	$resultado = $conexao->query($sql);

	$patio = $resultado->fetchAll();

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
	</header>
	<div id="container">
		<main>
			<h2>Patio</h2>

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