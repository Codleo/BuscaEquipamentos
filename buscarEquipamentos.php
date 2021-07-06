<?php 
session_start();
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
<link rel="stylesheet" href="styles.css">
	<title>Pesquisar equipamentos</title>
</head>
<body>

	<h1>Pesquisa equipamentos</h1>
	<form action="pesquisa.php" method="GET">
		<input type="text" id="tag" name="TAG" size="50" placeholder="Insira a TAG">
		<input id="btn" type="submit" value="Buscar"><br>
		<br><br><br><br><br><br><br><br>
	</form>
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 5;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		?>
		<div class="bd-text">
		<?php
		$result_equipamentos = "SELECT * FROM equipamentos LIMIT $inicio, $qnt_result_pg";
		$resultado_equipamentos = mysqli_query($con, $result_equipamentos);
		while($row_equipamentos = mysqli_fetch_assoc($resultado_equipamentos)){
			echo "ID: " . $row_equipamentos['id'] . "<br>";
			echo "Nome: " . $row_equipamentos['quemCadastrou'] . "<br>";
			echo "Patrimonio: " . $row_equipamentos['patrimonio'] . "<br>";
			echo "Equipamento: " . $row_equipamentos['equipamento'] . "<br>";
			echo "Local: " . $row_equipamentos['local'] . "<br>";
			echo "TAG: " . $row_equipamentos['TAG'] . "<br>";
			echo "Peça Trocada: " . $row_equipamentos['pecaTrocada'] . "<br>";
			echo "Data da Peça Trocada: " . $row_equipamentos['dataPecaTrocada'] . "<br>";
			echo "Tecnico que trocou a peça: " . $row_equipamentos['tecnicoTrocouPeca'] . "<br>";
			echo "OBS: " . $row_equipamentos['OBS'] . "<br><hr>";
		}
		?>
		</div>
		<?php 
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM equipamentos";
		$resultado_pg = mysqli_query($con, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='buscarEquipamentos.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='buscarEquipamentos.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='buscarEquipamentos.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='buscarEquipamentos.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	<br>

	<a href="logout.php">Sair</a>
</body>
</html>