<?php
include("connection.php");
include("functions.php");


if (!isset($_GET['tipo'])) {
	header("Location: index.php");
	exit;
}

$tipo = "%" . trim($_GET['tipo']) . "%";

$dbh = new PDO('mysql:host=localhost;dbname=cadastrarequipamentos', 'root', 'Winscp()1');

$sth = $dbh->prepare('SELECT * FROM `equipamentos` WHERE `tipo` LIKE :tipo');
$sth->bindParam(':tipo', $tipo, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
// editar isso depois ^^^^^^^^^^
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
	<link rel="stylesheet" href="styles.css">
	<title>Resultado da busca</title>
</head>

<body>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
	<a href="logout.php" id="logout">Sair</a>
	<h1>Resultado da busca</h1>
	<?php
	if (count($resultados)) {
		foreach ($resultados as $Resultado) {
	?>
			<label><b style='color:red;'><?php echo $Resultado['id']; ?></b> - <b style='color:red;'><?php echo $Resultado['tipo']; ?></b>
			<br>Nome:<b style='color:red;'><?php echo $Resultado['tecnicos']; ?></b><br>Equipamento:<b style='color:red;'><?php echo $Resultado['nome']; ?></b>
			<br>Patrimonio:<b style='color:red;'><?php echo $Resultado['patrimonio']; ?></b><br>Local:<b style='color:red;'><?php echo $Resultado['lugar']; ?></b><br>Numero de Serie:<b style='color:red;'><?php echo $Resultado['numeroSerie']; ?></b>
			<br>Data da Compra:<b style='color:red;'><?php echo $Resultado['dataCompra']; ?></b><br>Finalidade:<b style='color:red;'><?php echo $Resultado['finalidade']; ?></b><br> </label>
			<br>
			<hr>
		<?php
		}
	} else {
		?>
		<label>Não foram encontrados resultados pelo termo buscado.</label>
	<?php
	}
	?>
	<a href="logout.php" id="logout">Sair</a>
	<a href="menuLogado.php" id="logout">Voltar ao Menu</a>
</body>

</html>
