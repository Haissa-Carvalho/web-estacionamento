<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	$sql = "SELECT * FROM estaciona";
	$resultado = $conexao->query($sql);

	$estaciona = $resultado->fetchAll();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title> Estaciona - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
	</header>
	<div id="container">
		<main>
			<h2>Estaciona</h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Código</th>
							<th>Número do Patio</th>
							<th>Placa</th>
							<th>Data de Entrada</th>
							<th>Data de Saida</th>
							<th>Hora de Entrada</th>
							<th>Hora de Saida</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($estaciona as $estaciona): ?>
						<tr>
							<td><?= $estaciona['cod'] ?></td>
							<td><?= $estaciona['patio_num'] ?></td>
							<td><?= $estaciona['veiculo_placa'] ?></td>
							<td><?= $estaciona['dtentrada'] ?></td>
							<td><?= $estaciona['dtsaida'] ?></td>
							<td><?= $estaciona['hsentrada'] ?></td>
							<td><?= $estaciona['hssaida'] ?></td>
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