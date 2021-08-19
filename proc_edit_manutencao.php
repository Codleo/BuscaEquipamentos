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

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dataAbertura = filter_input(INPUT_POST, 'dataAbertura', FILTER_SANITIZE_STRING);
$defeito = filter_input(INPUT_POST, 'defeito', FILTER_SANITIZE_STRING);
$dataEncerrada = filter_input(INPUT_POST, 'dataEncerrada', FILTER_SANITIZE_STRING);


$result_equipamentos = "UPDATE  `cadastrarequipamentos`.` manutencao` SET `tecnico`='$tecnico',`OBS`='$OBS',`tipo`='$tipo',`pecaTrocada`='$pecaTrocada',`quemTrocouPeca`='$quemTrocouPeca',`encerrado`='$encerrado',`dataAbertura`='$dataAbertura',`pendente`='$pendente',`defeito`='$defeito',`dataEncerrada`='$dataEncerrada' WHERE `id`='$id'";
$resultado_equipamentos = mysqli_query($con, $result_equipamentos);


if(mysqli_affected_rows($con)){
    $_SESSION['msg'] = "<p style='color:green;'>A Ordem de Serviço foi editada com sucesso</p>";
    header("Location: buscarManutencao.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>A Ordem de Serviço não foi editada com sucesso</p>";
    header("Location: editarManutencao.php?id=$id");
}  


