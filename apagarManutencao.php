<?php
session_start();
include_once("connection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_manutencao = "DELETE FROM `cadastrarequipamentos`.` manutencao` WHERE id='$id'";
	$resultado_manutencao = mysqli_query($con, $result_manutencao);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: buscarManutencao.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: buscarManutencao.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: buscarManutencao.php");
}
