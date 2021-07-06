<?php 
session_start();
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
<link rel="stylesheet" href="styles.scss">
	<title>Santa Cecillia TV</title>
</head>
<body>

	<h1>Pesquisa equipamentos</h1>
	<form action="pesquisa.php" method="GET">
		<label>TAG do equipamento</label>
		<input type="text" name="TAG" size="50" placeholder="Insira a TAG">
		<button style="width:100px;">Buscar</button><br>
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
		
		$result_equipamentos = "SELECT * FROM equipamentos LIMIT $inicio, $qnt_result_pg";
		$resultado_equipamentos = mysqli_query($con, $result_equipamentos);

echo "<table border=1>";
 echo "<tr>";
 echo "<th>ID</th>";
 echo "<th>Quem cadastrou</th>";
 echo "<th>patrimonio</th>";
 echo "<th>equipamento</th>";
 echo "<th>local</th>";
 echo "<th>TAG</th>";
 echo "<th>peça trocada</th>";
 echo "<th>Data Peça trocada</th>";
 echo "<th>Tecnico que trocou a peça</th>";
 echo "<th>OBS</th>";
 echo "</tr>";
  
 $sql = "SELECT * FROM equipamentos";
 $resultado = mysqli_query($con,$sql) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
    $ID = $registro['id'];
    $quemCadastrou = $registro['quemCadastrou'];
    $patrimonio = $registro['patrimonio'];
    $equipamento = $registro['equipamento'];
    $local = $registro['local'];
    $TAG = $registro['TAG'];
    $pecaTrocada = $registro['pecaTrocada'];
    $dataPecaTrocada = $registro['dataPecaTrocada'];
    $tecnicoTrocouPeca = $registro['tecnicoTrocouPeca'];
    $OBS = $registro['OBS'];
    echo "<tr>";
    echo "<td>".$ID."</td>";
    echo "<td>".$quemCadastrou."</td>";
    echo "<td>".$patrimonio."</td>";
    echo "<td>".$equipamento."</td>";
    echo "<td>".$local."</td>";
    echo "<td>".$TAG."</td>";
    echo "<td>".$pecaTrocada."</td>";
    echo "<td>".$dataPecaTrocada."</td>";
    echo "<td>".$tecnicoTrocouPeca."</td>";
    echo "<td>".$OBS."</td>";
    echo "</tr>";
 }

 echo "</table>";
 
		
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