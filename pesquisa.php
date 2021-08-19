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
			<label><?php echo $Resultado['id']; ?> - <?php echo $Resultado['tipo']; ?><br>Nome:<?php echo $Resultado['tecnicos']; ?><br>Equipamento:<?php echo $Resultado['nome']; ?><br>Patrimonio:<?php echo $Resultado['patrimonio']; ?><br>Local:<?php echo $Resultado['lugar']; ?><br>Numero de Serie:<?php echo $Resultado['numeroSerie']; ?><br>Data da Compra:<?php echo $Resultado['dataCompra']; ?><br>Finalidade:<?php echo $Resultado['finalidade']; ?><br> </label>
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
