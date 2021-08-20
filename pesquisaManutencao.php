<?php
include("connection.php");
include("functions.php");


if (!isset($_GET['tipo'])) {
	header("Location: index.php");
	exit;
}

$tipo = "%" . trim($_GET['tipo']) . "%";

$dbh = new PDO('mysql:host=localhost;dbname=cadastrarequipamentos', 'root', 'Winscp()1');

$sth = $dbh->prepare('SELECT * FROM `cadastrarequipamentos`.` manutencao` WHERE `tipo` LIKE :tipo');
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
			<label>Ordem de Serviço número:<b style='color:red;'><?php echo $Resultado['id']; ?></b><br>Tipo do equipamento:<b style='color:red;'><?php echo $Resultado['tipo']; ?></b>
			<br>Solicitante:<b style='color:red;'><?php echo $Resultado['tecnico']; ?></b><br>Peça Trocada:<b style='color:red;'><?php echo $Resultado['pecaTrocada']; ?></b>
			<br>Quem Trocou a peça:<b style='color:red;'><?php echo $Resultado['quemTrocouPeca']; ?></b><br>Observação:<b style='color:red;'><?php echo $Resultado['OBS']; ?></b>
			<br>Defeito do equipamento:<b style='color:red;'><?php echo $Resultado['defeito']; ?></b><br>Pendente?:<b style='color:red;'><?php echo $Resultado['pendente']; ?></b>
			<br>Data de abertura:<b style='color:red;'><?php echo $Resultado['dataAbertura']; ?></b><br>Encerrado?:<b style='color:red;'><?php echo $Resultado['encerrado']; ?></b>
			<br>Data de Encerramento:<b style='color:red;'><?php echo $Resultado['dataEncerrada']; ?></b>
		
			</label>
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
