<?php
session_start();
include_once("connection.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuarios = "DELETE FROM users WHERE id='$id'";
	$resultado_usuarios = mysqli_query($con, $result_usuarios);
	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
		header("Location: buscarUsuarios.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: buscarUsuarios.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: buscarUsuarios.php");
}
