<?php
session_start();
include_once("connection.php");
include("functions.php");
$user_data = check_login($con);


$tecnicos = $_POST['tecnicos'];
$lugar = $_POST['lugar'];
$tipo = $_POST['tipo'];
$finalidade = $_POST['finalidade'];


$patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$numeroSerie = filter_input(INPUT_POST, 'numeroSerie', FILTER_SANITIZE_STRING);
$dataCompra = filter_input(INPUT_POST, 'dataCompra', FILTER_SANITIZE_NUMBER_INT);


$result_equipamentos = "INSERT INTO equipamentos (tecnicos,nome,patrimonio,numeroSerie,lugar,tipo,dataCompra,finalidade) VALUES ('$tecnicos','$nome', '$patrimonio','$numeroSerie','$lugar','$tipo','$dataCompra','$finalidade')";
$resultado_equipamentos = mysqli_query($con, $result_equipamentos);


if(mysqli_insert_id($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: buscarEquipamentos.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: index.php");
}

?>