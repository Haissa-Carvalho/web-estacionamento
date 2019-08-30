<?php

var_dump($_POST);

if (count($_POST) > 0) {
	// um formulário foi enviado.
	// inserir no banco de dados

	$banco = "estacionamento";
	$usuario = "estacionamento";
	$senha = "joselia";

	// me conecto ao banco de dados usando o PDO
	$conexao = new PDO("mysql:host=localhost;dbname=${banco}", $usuario, $senha);

	// monto o meu comando SQL em uma string
	// Os pontos de interrogação definem lugares
	// no comando que devem ser preenchidos
	// com dados
	$sql = "INSERT INTO veiculo VALUES (?, ?, ?, ?)";

	// uso "prepare" para criar o comando a partir da minha string
	$comando = $conexao->prepare($sql);

	// uso "execute" para executar o comando SQL.
	// Passo os dados esperados pelo comando em um vetor (array)
	// Os dados passados seguem a ordem dos pontos de interrogação acima
	// Se o comando funcionar, "execute" retornará TRUE
	// Caso contrário, "execute" retornará FALSE
	$sucesso = $comando->execute([
		$_POST['placa'],
		$_POST['modelo_codmod'],
		$_POST['cliente_cpf'],
		$_POST['cor']
	]);

	// se o comando for bem sucedido, monto uma mensagem amigável
	$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Veículo cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}

	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);

	// redireciona para a página clientes.php
	header('Location: veiculos.php');
}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Novo Veiculo - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
	</header>
	<div id="container">
		<main>
			<h2>Novo Veiculo</h2>

			<form action="cad_veiculos.php" method="post">
				<p><label for="iplaca">Placa:</label></p>
				<p><input type="text" id="iplaca" name="placa"></p>

				<p><label for="imodelo_codmod">Código do modelo:</label></p>
				<p><input type="text" id="imodelo_codmod" name="modelo_codmod"></p>

				<p><label for="icliente_cpf">Cliente CPF</label></p>
				<p><input type="number" id="icliente_cpf" name="cliente_cpf"></p>

				<p><label for="icor">Cor:</label></p>
				<p><input type="text" id="icor" name="cor"></p>

				<p><button type="submit">Salvar</button></p>
			</form>

		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>