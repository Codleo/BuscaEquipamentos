<?php
session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($con);

$result_tecnico = "SELECT * FROM tecnicos";
$resultado_tecnico = mysqli_query($con, $result_tecnico);
$result_quemTrocouPeca = "SELECT * FROM tecnicos";
$resultado_quemTrocouPeca = mysqli_query($con, $result_quemTrocouPeca);
$result_tipo = "SELECT * FROM tipo";
$resultado_tipo = mysqli_query($con, $result_tipo);
//$result_lugar = "SELECT * FROM lugar";
//$resultado_lugar = mysqli_query($con, $result_lugar);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_manutencao = "SELECT * FROM `cadastrarequipamentos`.` manutencao` WHERE id = '$id'";
$resultado_manutencao = mysqli_query($con, $result_manutencao);
$row_manutencao = mysqli_fetch_assoc($resultado_manutencao);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <title>Editar Ordem de Serviço</title>
</head>

<body>
    <div id="corpo-form-Cad">
        <a href="logout.php">Sair</a><br>
        <a href="menuLogado.php" >Voltar ao Menu</a> <br>
        <h1>Editar Ordem de Serviço</h1>
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
	if ($row['nivel'] == '5' || $row['nivel'] == '3' || $row['nivel']== '2'){
        ?>

            <form method="POST" action="proc_edit_manutencao.php">
            <input type="hidden" name="id" value="<?php echo $row_manutencao['id']; ?>">
            <label for="tecnico">Solicitante </label> <select name="tecnico" id="tecnico" required>
            <option value="<?php echo $row_manutencao['tecnico']; ?>"><?php echo $row_manutencao['tecnico']; ?></option>
				<?php while ($rows_tecnico = mysqli_fetch_array($resultado_tecnico)) :; ?>
					<option value="<?php echo $rows_tecnico[1]; ?>"><?php echo $rows_tecnico[1]; ?></option>
				<?php endwhile; ?>
			</select>
            <label for="tipo_select">Tipo do equipamento</label><select name="tipo" id="tipo_select">
            <option value="<?php echo $row_manutencao['tipo']; ?>"><?php echo $row_manutencao['tipo']; ?></option>
				<?php while ($rows_tipo = mysqli_fetch_array($resultado_tipo)) :; ?>
					<option value="<?php echo $rows_tipo[1]; ?>"><?php echo $rows_tipo[1]; ?></option>
				<?php endwhile; ?>
			</select>

			<label for="pecaTrocada">Peça trocada</label> <input type="text" name="pecaTrocada" id="pecaTrocada" value="<?php echo $row_manutencao['pecaTrocada']; ?>" required>
			<label for="OBS">Observação</label> <input type="text" name="OBS" id="OBS" value="<?php echo $row_manutencao['OBS']; ?>" required>
			<label for="defeito">Defeito do Equipamento</label><input type="text" name="defeito" value="<?php echo $row_manutencao['defeito']; ?>" id="defeito" value="<?php echo $row_manutencao['nome']; ?>" required>          
            <label for="encerrado">Encerrado?</label> <select name="encerrado" id="encerrado" required>
            <option value="<?php echo $row_manutencao['encerrado']; ?>"><?php echo $row_manutencao['encerrado']; ?></option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option></select>
            <label for="dataAbertura">Data da Abertura</label><input type="text" name="dataAbertura" value="<?php echo $row_manutencao['dataAbertura']; ?>" id="dataAbertura" class="js-date" placeholder="dd-mm-yyyy" min="01-01-1980" max="31-12-2025" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"  maxlength="10"  required>
            <label for="dataEncerrada">Data da Encerrada</label><input type="text" name="dataEncerrada" value="<?php echo $row_manutencao['dataEncerrada']; ?>"  id="dataEncerrada" class="js-data" placeholder="dd-mm-yyyy" min="01-01-1980" max="31-12-2025" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"  maxlength="10"  required>
			
            <label for="quemTrocouPeca">quem Trocou a Peça</label> <select name="quemTrocouPeca" id="quemTrocouPeca" required>
            <option value="<?php echo $row_manutencao['quemTrocouPeca']; ?>"><?php echo $row_manutencao['quemTrocouPeca']; ?></option>
				<?php while ($rows_quemTrocouPeca = mysqli_fetch_array($resultado_quemTrocouPeca)) :; ?>
					<option value="<?php echo $rows_quemTrocouPeca[1]; ?>"><?php echo $rows_quemTrocouPeca[1]; ?></option>
				<?php endwhile; ?>
			</select>

            <label for="pendente">Pendente?</label> <select name="pendente" id="pendente" required> 
            <option value="<?php echo $row_manutencao['pendente']; ?>"><?php echo $row_manutencao['pendente']; ?></option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option></select>
            <input type="submit" value="Editar"> <br> <br>
        
        <?php
    }
	else if($row['nivel'] == '1' || $row['nivel'] == '2' || $row['nivel'] == '3') {
		echo "<h2>" ."Você não pode acessar essa página"."</h2>";
	}
}
	?> 
            <a href="logout.php">Sair</a><br>
            <a href="menuLogado.php">Voltar ao Menu</a>  
        </form>
    </div>
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
</body>

</html>