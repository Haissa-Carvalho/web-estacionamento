<?php 

	$conexao = new PDO("mysql:host=localhost;dbname=estacionamento", "estacionamento", "joselia");

	/*$sql = "SELECT * FROM veiculo";*/
	/*$sql = "SELECT placa, desc_2, cliente_cpf, cor FROM veiculo, Modelo WHERE modelo_codmod = codmod";*/

	$sql = <<<EOL
	SELECT placa, desc_2, Nome, cor
	  FROM veiculo, Modelo, Cliente
	WHERE modelo_codmod = codmod
	  AND cliente_cpf = cpf
EOL;


	$resultado = $conexao->query($sql);

	$veiculos = $resultado->fetchAll();

	// verifico se tem mensagem pra ser exibida ao usuário.
	$mensagem = "";
	if (isset($_COOKIE['mensagem']))
	{
		$mensagem = $_COOKIE['mensagem'];

		// depois que exibo a mensagem, devo retirá-la
		// dos cookies.
		setcookie('mensagem', '', 1);
	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Veículos - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patios.php">Pátios</a></li>
				<li><a href="clientes.php">Clientes</a></li>
				<li class="ativo"><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Veículos</h2>

			<?php if(!empty($mensagem)): ?>
				<div id="mensagem">
					<?= $mensagem; ?>
				</div>
			<?php endif; ?>

			<p><a href="cad_veiculos.php">Novo Veículo</a></p>

			<?php if (count($veiculos) == 0): ?>

				<p>Não há nenhum registro.</p>

			<?php else: ?>

			<table class="tabela-dados">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Modelo</th>
							<th>Cor</th>
							<th>Cliente</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($veiculos as $veiculo): ?>
						<tr>
							<td><?= $veiculo['placa'] ?></td>
							<td><?= $veiculo['desc_2'] ?></td>
							<td><?= $veiculo['cor'] ?></td>
							<td><?= $veiculo['Nome'] ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
			<?php endif; ?>
		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>