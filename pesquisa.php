<?php

if (!isset($_GET['TAG'])) {
	header("Location: index.php");
	exit;
}

$TAG = "%".trim($_GET['TAG'])."%";

$dbh = new PDO('mysql:host=localhost;dbname=cadastrarequipamentos', 'root', '');

$sth = $dbh->prepare('SELECT * FROM `equipamentos` WHERE `TAG` LIKE :TAG');
$sth->bindParam(':TAG', $TAG, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
<link rel="stylesheet" href="styles.css">
	<title>Resultado da busca</title>
</head>
<body>
<h1>Resultado da busca</h1>
<?php
if (count($resultados))  
        {
	foreach($resultados as $Resultado) {
?>
<label><?php echo $Resultado['id']; ?> - <?php echo $Resultado['TAG'];?><br><?php echo $Resultado['quemCadastrou'];?><br><?php echo $Resultado['patrimonio'];?><br><?php echo $Resultado['equipamento'];?><br><?php echo $Resultado['local'];?><br><?php echo $Resultado['pecaTrocada'];?><br><?php echo $Resultado['dataPecaTrocada'];?><br><?php echo $Resultado['tecnicoTrocouPeca'];?><br><?php echo $Resultado['OBS'];?><br> </label>
<br>
<?php
    } 
        }      
else {
?>
<label>Não foram encontrados resultados pelo termo buscado.</label>
<?php
}
?>
	<a href="logout.php">Sair</a>
</body>
</html>