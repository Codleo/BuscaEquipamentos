<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$result_tecnicos = "SELECT * FROM tecnicos";
$resultado_tecnicos = mysqli_query($con, $result_tecnicos);
$result_quemTrocouPeca = "SELECT * FROM tecnicos";
$resultado_quemTrocouPeca = mysqli_query($con, $result_quemTrocouPeca);
$result_tipo = "SELECT * FROM tipo";
$resultado_tipo = mysqli_query($con, $result_tipo);
//$result_lugar = "SELECT * FROM lugar";
//$resultado_lugar = mysqli_query($con, $result_lugar);


?>

<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
	<link rel="stylesheet" href="styles.css">
	<title>Cadastrar Ordem Serviço</title>
</head>

<body>

	<div id="corpo-form-Cad">
		<a href="logout.php" id="logoutTelaPrincipal">Sair</a> <br>
		<a href="menuLogado.php">Voltar ao Menu</a><br>


		<h1>Cadastrar Ordem Serviço</h1>
		<?php
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_manutencao.php">
			<label for="tecnico">Técnicos </label> <select name="tecnico" id="tecnico" required>
				<?php while ($rows_tecnicos = mysqli_fetch_array($resultado_tecnicos)) :; ?>
					<option value="<?php echo $rows_tecnicos[1]; ?>"><?php echo $rows_tecnicos[1]; ?></option>
				<?php endwhile; ?>
			</select>
            <label for="tipo_select">Tipo do equipamento</label><select name="tipo" id="tipo_select">
				<?php while ($rows_tipo = mysqli_fetch_array($resultado_tipo)) :; ?>
					<option value="<?php echo $rows_tipo[1]; ?>"><?php echo $rows_tipo[1]; ?></option>
				<?php endwhile; ?>
			</select>
			<label for="pecaTrocada">Peça trocada</label> <input type="text" name="pecaTrocada" id="pecaTrocada" required>
			<label for="OBS">Observação</label> <input type="text" name="OBS" id="OBS" required>
			<label for="defeito">Defeito do Equipamento</label><input type="text" name="defeito" id="defeito" required>
            <label for="encerrado">Encerrado?</label> <select name="encerrado" id="encerrado" required> <option value="Sim">Sim</option><option value="Nao">Não</option></select>
            <label for="dataAbertura">Data da Abertura</label><input type="text" name="dataAbertura" id="dataAbertura" class="js-date" placeholder="dd-mm-yyyy" min="01-01-1980" max="31-12-2025" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"  maxlength="10"  required>
            <label for="dataEncerrada">Data da Encerrada</label><input type="text" name="dataEncerrada" id="dataEncerrada" class="js-data" placeholder="dd-mm-yyyy" min="01-01-1980" max="31-12-2025" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"  maxlength="10"  required>
			<label for="quemTrocouPeca">quem Trocou a Peça</label> <select name="quemTrocouPeca" id="quemTrocouPeca" required>
				<?php while ($rows_quemTrocouPeca = mysqli_fetch_array($resultado_quemTrocouPeca)) :; ?>
					<option value="<?php echo $rows_quemTrocouPeca[1]; ?>"><?php echo $rows_quemTrocouPeca[1]; ?></option>
				<?php endwhile; ?>
			</select>
            <label for="pendente">Pendente?</label> <select name="pendente" id="pendente" required> <option value="Sim">Sim</option><option value="Nao">Não</option></select>
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

var input1 = document.querySelectorAll('.js-data')[0];
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
	
dateInputMask(input1);
		</script>
		</script>
		</form>
	</div>
</body>

</html>