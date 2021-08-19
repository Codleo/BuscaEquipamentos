<?php
session_start();
include_once("connection.php");
include("functions.php");
$user_data = check_login($con);


$tecnico = $_POST['tecnico'];
$OBS = $_POST['OBS'];
$tipo = $_POST['tipo'];
$pecaTrocada = $_POST['pecaTrocada'];
$quemTrocouPeca= $_POST['quemTrocouPeca'];
$encerrado = $_POST['encerrado'];
$pendente = $_POST['pendente'];

$dataAbertura = filter_input(INPUT_POST, 'dataAbertura', FILTER_SANITIZE_STRING);
$defeito = filter_input(INPUT_POST, 'defeito', FILTER_SANITIZE_STRING);
$dataEncerrada = filter_input(INPUT_POST, 'dataEncerrada', FILTER_SANITIZE_STRING);


$result_manutencao = "INSERT INTO `cadastrarequipamentos`.` manutencao` (`tecnico`, `tipo`, `pecaTrocada`, `OBS`, `defeito`, `encerrado`, `dataAbertura`, `dataEncerrada`, `quemTrocouPeca`, `pendente`) VALUES ('$tecnico', '$tipo', '$pecaTrocada', '$OBS', '$defeito', '$encerrado', '$dataAbertura', '$dataEncerrada', '$quemTrocouPeca', '$pendente')";
$resultado_manutencao = mysqli_query($con, $result_manutencao);


if(mysqli_insert_id($con)){
	$_SESSION['msg'] = "<p style='color:green;'>Ordem de Serviço cadastrada com sucesso</p>";
	header("Location: buscarManutencao.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Ordem de Serviço não foi cadastrada com sucesso</p>";
	header("Location: index.php");
}

?>