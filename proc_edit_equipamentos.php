<?php
    session_start();
    include_once("connection.php");
    include("functions.php");
$user_data = check_login($con);


$tecnicos=$_POST['tecnicos'];
$lugar=$_POST['lugar'];
$tipo=$_POST['tipo'];
$finalidade=$_POST['finalidade'];

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$numeroSerie = filter_input(INPUT_POST, 'numeroSerie', FILTER_SANITIZE_NUMBER_INT);
$dataCompra = filter_input(INPUT_POST, 'dataCompra', FILTER_SANITIZE_NUMBER_INT);


$result_equipamentos = "UPDATE equipamentos SET tecnicos='$tecnicos',nome='$nome',patrimonio='$patrimonio',numeroSerie='$numeroSerie',lugar='$lugar',tipo='$tipo',dataCompra='$dataCompra',finalidade='$finalidade' WHERE id='$id'";
$resultado_equipamentos = mysqli_query($con, $result_equipamentos);


if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
    header("Location: buscarEquipamentos.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
    header("Location: editarEquipamentos.php?id=$id");
}
   


