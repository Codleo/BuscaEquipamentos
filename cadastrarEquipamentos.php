<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$result_tecnicos = "SELECT * FROM tecnicos";
$resultado_tecnicos = mysqli_query($con, $result_tecnicos);
$result_tipo = "SELECT * FROM tipo";
$resultado_tipo = mysqli_query($con, $result_tipo);
$result_finalidade = "SELECT * FROM finalidade";
$resultado_finalidade = mysqli_query($con, $result_finalidade);
$result_lugar = "SELECT * FROM lugar";
$resultado_lugar = mysqli_query($con, $result_lugar);


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
		<a href="logout.php" id="logoutTelaPrincipal">Sair</a> <br>
		<a href="menuLogado.php">Voltar ao Menu</a><br>


		<h1>Cadastrar Equipamentos</h1>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_equipamentos.php">
			<label for="tecnicos">Técnicos </label> <select name="tecnicos" id="tecnicos">
				<?php while ($rows_tecnicos = mysqli_fetch_array($resultado_tecnicos)) :; ?>
					<option value="<?php echo $rows_tecnicos[1]; ?>"><?php echo $rows_tecnicos[1]; ?></option>
				<?php endwhile; ?>
			</select>
			<label for="nome">Nome do Equipamento</label> <input type="text" name="nome" id="nome" required>
			<label for="patrimonio">Patrimônio</label> <input type="text" name="patrimonio" id="Patrimonio" required>
			<label for="numeroSerie">Número de Série</label><input type="text" name="numeroSerie" id="numeroSerie" required>
			<label for="lugar">Lugar</label><select name="lugar" id="lugar">
				<?php while ($rows_lugar = mysqli_fetch_array($resultado_lugar)) :; ?>
					<option value="<?php echo $rows_lugar[1]; ?>"><?php echo $rows_lugar[1]; ?></option>
				<?php endwhile; ?>
			</select>
			<label for="tipo_select">Tipo</label><select name="tipo" id="tipo_select">
				<?php while ($rows_tipo = mysqli_fetch_array($resultado_tipo)) :; ?>
					<option value="<?php echo $rows_tipo[1]; ?>"><?php echo $rows_tipo[1]; ?></option>
				<?php endwhile; ?>
			</select>
			<label for="finalidade">Finalidade</label> <select name="finalidade" id="finalidade">
				<?php while ($rows_finalidade = mysqli_fetch_array($resultado_finalidade)) :; ?>
					<option value="<?php echo $rows_finalidade[1]; ?>"><?php echo $rows_finalidade[1]; ?></option>
				<?php endwhile; ?>
			</select>
			<label for="dataCompra">Data da Compra</label><input type="text" name="dataCompra" id="dataCompra" class="js-date" placeholder="dd-mm-yyyy" min="01-01-1980" max="31-12-2025" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"  maxlength="10"  required>
			<input id="button" type="submit" value="Cadastrar">

			<br>
		<script>
			var input = document.querySelectorAll('.js-date')[0];
  
  var dateInputMask = function dateInputMask(elm) {
	elm.addEventListener('keypress', function(e) {
	  if(e.keyCode < 47 || e.keyCode > 57) {
		e.preventDefault();
	  }
	  
	  var len = elm.value.length;
	  
	  // If we're at a particular place, let the user type the slash
	  // i.e., 12/12/1212
	  if(len !== 1 || len !== 3) {
		if(e.keyCode == 47) {
		  e.preventDefault();
		}
	  }
	  
	  // If they don't add the slash, do it for them...
	  if(len === 2) {
		elm.value += '-';
	  }
  
	  // If they don't add the slash, do it for them...
	  if(len === 5) {
		elm.value += '-';
	  }
	});
  };
	
  dateInputMask(input);
		</script>
		</form>
	</div>
</body>

</html>