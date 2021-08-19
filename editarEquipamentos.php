<?php
session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($con);

$result_tecnicos = "SELECT * FROM tecnicos";
$resultado_tecnicos = mysqli_query($con, $result_tecnicos);
$result_tipo = "SELECT * FROM tipo";
$resultado_tipo = mysqli_query($con, $result_tipo);
$result_finalidade = "SELECT * FROM finalidade";
$resultado_finalidade = mysqli_query($con, $result_finalidade);
$result_lugar = "SELECT * FROM lugar";
$resultado_lugar = mysqli_query($con, $result_lugar);


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_equipamentos = "SELECT * FROM equipamentos WHERE id = '$id'";
$resultado_equipamentos = mysqli_query($con, $result_equipamentos);
$row_equipamentos = mysqli_fetch_assoc($resultado_equipamentos);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <title>Editar Equipamentos</title>
</head>

<body>
  
    <div id="corpo-form-Cad">
        <a href="logout.php">Sair</a><br>
        <a href="menuLogado.php" >Voltar ao Menu</a> <br>
        <h1>Editar Equipamentos</h1>
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

            <form method="POST" action="proc_edit_equipamentos.php">
            <input type="hidden" name="id" value="<?php echo $row_equipamentos['id']; ?>">

            <label for="tecnicos">Técnicos </label> <select name="tecnicos" id="tecnicos">
                <option value="<?php echo $row_equipamentos['tecnicos']; ?>"><?php echo $row_equipamentos['tecnicos']; ?></option>
                <?php while ($rows_tecnicos = mysqli_fetch_array($resultado_tecnicos)) :; ?>
                    <option value="<?php echo $rows_tecnicos[1]; ?>"><?php echo $rows_tecnicos[1]; ?></option>
                <?php endwhile; ?>
            </select>
           
            <label for="nome">Nome do Equipamento</label> <input type="text" name="nome" id="nome" value="<?php echo $row_equipamentos['nome']; ?>" required>
            <label for="patrimonio">Patrimônio</label> <input type="text" name="patrimonio" id="Patrimonio" value="<?php echo $row_equipamentos['patrimonio']; ?>" required> 
            <label for="numeroSerie">Número de Série</label><input type="text" name="numeroSerie" id="numeroSerie" value="<?php echo $row_equipamentos['numeroSerie']; ?>" required>
           
            <label for="lugar">Lugar</label><select name="lugar" id="lugar">
                <option value="<?php echo $row_equipamentos['lugar']; ?>"><?php echo $row_equipamentos['lugar']; ?></option>
                <?php while ($rows_lugar = mysqli_fetch_array($resultado_lugar)) :; ?>
                    <option value="<?php echo $rows_lugar[1]; ?>"><?php echo $rows_lugar[1]; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="tipo_select">Tipo</label><select name="tipo" id="tipo_select">
                <option value="<?php echo $row_equipamentos['tipo']; ?>"><?php echo $row_equipamentos['tipo']; ?></option>
                <?php while ($rows_tipo = mysqli_fetch_array($resultado_tipo)) :; ?>
                    <option value="<?php echo $rows_tipo[1]; ?>"><?php echo $rows_tipo[1]; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="finalidade">Finalidade</label> <select name="finalidade" id="finalidade">
                <option value="<?php echo $row_equipamentos['finalidade']; ?>"><?php echo $row_equipamentos['finalidade']; ?></option>
                <?php while ($rows_finalidade = mysqli_fetch_array($resultado_finalidade)) :; ?>
                    <option value="<?php echo $rows_finalidade[1]; ?>"><?php echo $rows_finalidade[1]; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="dataCompra">Data da Compra</label><input placeholder="dd-mm-yyyy" maxlength="10" min="01-01-1980" max="31-12-2025" name="dataCompra" class="js-date" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" id="dataCompra" value="<?php echo $row_equipamentos['dataCompra']; ?>" >

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
    </script>
</body>

</html>