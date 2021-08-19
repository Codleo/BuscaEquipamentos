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
	<title>Santa Cecilia TV - Usuarios</title>
</head>

<body>
	<a href="logout.php" id="logout">Sair</a>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
    <?php
	if (isset($_SESSION['msg'])) {
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	$id = $_SESSION['use_id'];
	$result_usuario = "SELECT * from users WHERE use_id = '$id' limit 1";
	$resultado_usuario = mysqli_query($con, $result_usuario);
	while ($row = mysqli_fetch_assoc($resultado_usuario)) {
	echo "<h2>" . $row['use_name'] . " "."seu nivel é " . $row['nivel'] . "!</h2> <br>";
	if ($row['nivel'] == '5'){

	//Receber o número da página
	$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

	//Setar a quantidade de itens por pagina
	$qnt_result_pg = 3;

	//calcular o inicio visualização
	$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

	$result_usuarios = "SELECT users.* FROM users LIMIT $inicio, $qnt_result_pg";
	$resultado_usuarios = mysqli_query($con, $result_usuarios);
	while ($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)) {
		echo "<br>";
		echo "ID: " ."<b>" . $row_usuarios['id'] . "</b><br>";
		echo "Nome: " ."<b>" . $row_usuarios['use_name'] . "</b><br>";
		echo "Email: " ."<b>" . $row_usuarios['email']. "</b><br>";
		echo "Nivel: " ."<b>" . $row_usuarios['nivel'] . "</b><br>";
		echo "Data de modificação: " ."<b>" . $row_usuarios['date_created'] . "</b><br><br><hr>";
		echo "<a id=pagBuscar href='editarUsuarios.php?id=" . $row_usuarios['id'] . "'>Editar</a>";
		echo "<a id=pagBuscar href='apagarUsuarios.php?id=" . $row_usuarios['id'] . "'>Apagar</a><hr>";
	}



	//Paginção - Somar a quantidade de usuários
	$result_pg = "SELECT COUNT(id) AS num_result FROM users";
	$resultado_pg = mysqli_query($con, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	//Quantidade de pagina 
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

	//Limitar os link antes depois
	$max_links = 2;
	echo "<a id='logout' href='buscarUsuarios.php?pagina=1'>Primeira</a> ";

	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if ($pag_ant >= 1) {
			echo "<a id='logout' href='buscarUsuarios.php?pagina=$pag_ant'>$pag_ant</a> ";
		}
	}

	//echo "$pagina ";

	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if ($pag_dep <= $quantidade_pg) {
			echo "<a id='logout' href='buscarUsuarios.php?pagina=$pag_dep'>$pag_dep</a> ";
		}
	}

	echo "<a id='logout' href='buscarUsuarios.php?pagina=$quantidade_pg'>Ultima</a>";
	}
	else if($row['nivel'] == '1' || $row['nivel'] == '2' || $row['nivel'] == '3') {
		echo "<h2>" ."Você não pode acessar essa página"."</h2>";
	}
}
	?>
	<br>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
	<a href="logout.php" id="logout">Sair</a>
</body>

</html>