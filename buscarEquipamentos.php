<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
	<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
	<link rel="stylesheet" href="styles.css">
	<title>Santa Cecilia TV</title>
</head>

<body>
	<a href="logout.php" id="logout">Sair</a>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
	<?php
	$id = $_SESSION['use_id'];
	$result_usuario = "SELECT * from users WHERE use_id = '$id' limit 1";
	$resultado_usuario = mysqli_query($con, $result_usuario);
	while ($row = mysqli_fetch_assoc($resultado_usuario)) {
	echo "<h2 id='nomeComNivel'>" . $row['use_name'] . " "."seu nivel é " . $row['nivel'] . "!</h2> <br>";
	if ($row['nivel'] == '5' || $row['nivel'] == '3' || $row['nivel'] == '2'){
		?>
	<h1 id="pesquisa">Pesquisa equipamentos</h1>
	<form action="pesquisa.php" method="GET">
		<input type="text" id="tipo" name="tipo"  placeholder="Insira o tipo do equipamento">
		<input id="btn" type="submit" value="Buscar"><br>
		<br><br><br><br><br><br><br><br>
	</form>
	<?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}

	//Receber o número da página
	$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

	//Setar a quantidade de itens por pagina
	$qnt_result_pg = 3;

	//calcular o inicio visualização
	$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

	$result_equipamentos = "SELECT equipamentos.* FROM equipamentos LIMIT $inicio, $qnt_result_pg";
	$resultado_equipamentos = mysqli_query($con, $result_equipamentos);
	while ($row_equipamentos = mysqli_fetch_assoc($resultado_equipamentos)) {
		echo "<br>";
		echo "ID: " ."<b style='color:red;'>" . $row_equipamentos['id'] . "</b><br>";
		echo "Nome: " ."<b style='color:red;'>" . $row_equipamentos['tecnicos'] . "</b><br>";
		echo "Patrimonio: " ."<b style='color:red;'>" . $row_equipamentos['patrimonio'] . "</b><br>";
		echo "Número de Série: " ."<b style='color:red;'>" . $row_equipamentos['numeroSerie']. "</b><br>";
		echo "Equipamento: " ."<b style='color:red;'>" . $row_equipamentos['nome'] . "</b><br>";
		echo "Local: " ."<b style='color:red;'>" . $row_equipamentos['lugar'] . "</b><br>";
		echo "tipo: " ."<b style='color:red;'>" . $row_equipamentos['tipo'] . "</b><br>";
		echo "finalidade: " ."<b style='color:red;'>" . $row_equipamentos['finalidade'] . "</b><br>";
		echo "Data da Compra: " ."<b style='color:red;'>" . $row_equipamentos['dataCompra'] . "</b><br><br><hr>";
		echo "<a id=pagBuscar href='editarEquipamentos.php?id=" . $row_equipamentos['id'] . "'>Editar</a>";
		echo "<a id=pagBuscar href='apagarEquipamentos.php?id=" . $row_equipamentos['id'] . "'>Apagar</a><hr>";
	}

	//Paginção - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(id) AS num_result FROM equipamentos";
	$resultado_pg = mysqli_query($con, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	//echo $row_pg['num_result'];
	//Quantidade de pagina 
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;
	echo "<a id='logout' href='buscarEquipamentos.php?pagina=1'>Primeira</a> ";

	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if ($pag_ant >= 1) {
			echo "<a id='logout' href='buscarEquipamentos.php?pagina=$pag_ant'>$pag_ant</a> ";
		}
	}

	

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if ($pag_dep <= $quantidade_pg) {
			echo "<a id='logout' href='buscarEquipamentos.php?pagina=$pag_dep'>$pag_dep</a> ";
		}
	}

	echo "<a id='logout' href='buscarEquipamentos.php?pagina=$quantidade_pg'>Ultima</a>";
	}
	else if($row['nivel'] == '1') {
		echo "<h2>" ."Você não pode acessar essa página"."</h2>";
	}
}
	?>
	<br>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
	<a href="logout.php" id="logout">Sair</a>
</body>

</html>