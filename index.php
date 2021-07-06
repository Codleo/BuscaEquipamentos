<?php 
session_start();

	include("connection.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$quemCadastrou = $_POST['quemCadastrou'];
		$patrimonio = $_POST['patrimonio'];
		$equipamento = $_POST['equipamento'];
		$local = $_POST['local'];
		$TAG = $_POST['TAG'];
		//$manutencao = $_POST['manutencao'];
		$pecaTrocada = $_POST['pecaTrocada'];
		$dataPecaTrocada = $_POST['dataPecaTrocada'];
		$tecnicoTrocouPeca = $_POST['tecnicoTrocouPeca'];
		$OBS = $_POST['OBS'];
		if(!empty($patrimonio) && !empty($equipamento) && !empty($local) && !empty($quemCadastrou) && !empty($TAG) && !empty($pecaTrocada) && !empty($dataPecaTrocada)&& !empty($tecnicoTrocouPeca)&& !empty($OBS))
		{							
				//save to database
			
				$query = "insert into equipamentos (quemCadastrou,patrimonio,equipamento,local,TAG,pecaTrocada,dataPecaTrocada,tecnicoTrocouPeca,OBS) values ('$quemCadastrou','$patrimonio','$equipamento','$local','$TAG','$pecaTrocada','$dataPecaTrocada','$tecnicoTrocouPeca','$OBS')";				
				mysqli_query($con, $query);			
				header("Location: buscarEquipamentos.php");
				die;										
		}else
		{
			?>
			<div class="msg-erro">              
			Por favor ,preencha todos os campos!
			</div>
			<?php
			
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
<link rel="stylesheet" href="styles.css">
	<title>Cadastrar Equipamentos</title>
</head>
<body>

	<div id="corpo-form-Cad">
		<h1>Cadastrar Equipamentos</h1>
		<form method="post">
		<input id="text" type="text" name="quemCadastrou" placeholder="Qual o seu nome?" >
			<input id="text" type="text" name="patrimonio" placeholder="Patrimonio">
			<input id="text" type="text" name="equipamento" placeholder="Equipamento">
			<input id="text" type="text" name="local" placeholder="Local do Equipamento">
			<input id="text" type="text" name="TAG" placeholder="TAG" >
			<input id="text" type="text" name="pecaTrocada" placeholder="Qual peça foi trocada" >					
			<input id="text" type="text" name="dataPecaTrocada" placeholder="Data da peça trocada">		
			<input id="text" type="text" name="tecnicoTrocouPeca" placeholder="Quem trocou a peça">
			<input id="text" type="text" name="OBS" placeholder="Observação">
			<input id="button" type="submit" value="Cadastrar">

		<a href="buscarEquipamentos.php">Clique para buscar algum equipamento</a> 
		</form>
	</div>
</body>
</html>