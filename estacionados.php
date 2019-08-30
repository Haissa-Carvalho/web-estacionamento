<?php
$estacionamento = 
	[
		[
			'cod'=>'01',
			'patio_num'=>'10',
			'veiculo_placa'=>'GTA1234',
			'dtEntrada'=>'11/07/2019',
			'dtSaida'=>'12/07/2019',
			'hsEntrada'=>'14:00',
			'hsSaida'=>'17:00'
		],

		[
			'cod'=>'02',
			'patio_num'=>'20',
			'veiculo_placa'=>'ISA4321',
			'dtEntrada'=>'13/07/2019',
			'dtSaida'=>'14/07/2019',
			'hsEntrada'=>'15:00',
			'hsSaida'=> '19:00'
		],

		[
			'cod'=>'03',
			'patio_num'=>'20',
			'veiculo_placa'=>'MAR1404',
			'dtEntrada'=>'13/07/2019',
			'dtSaida'=>'',
			'hsEntrada'=>'16:00',
			'hsSaida'=> ''
		],

	];
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Estacionados - IF Park</title>
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
			<h2>Carros Estacionados</h2>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Cód.</th>
							<th>Pátio</th>
							<th>Placa</th>
							<th>Entrada</th>
							<th>Saída</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($estacionamento as $e): ?>
						<tr>
							<td><?= $e['cod'] ?></td>
							<td><?= $e['patio_num'] ?></td>
							<td><?= $e['veiculo_placa'] ?></td>
							<td><?= $e['dtEntrada'] . ' ' . $e['hsEntrada'] ?></td>
							<td><?= $e['dtSaida'] . ' ' . $e['hsSaida'] ?></td>
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