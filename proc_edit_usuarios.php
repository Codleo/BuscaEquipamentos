<?php
session_start();
include_once("connection.php");
include("functions.php");
$user_data = check_login($con);


$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $use_name = $_POST['use_name'];
    $email = $_POST['email'];
    $nivel = $_POST['nivel'];
}
//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE users SET use_name='$use_name', email='$email',nivel='$nivel' WHERE id='$id'";
$resultado_usuario = mysqli_query($con, $result_usuario);

if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
    header("Location: buscarUsuarios.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
    header("Location: editar.php?id=$id");
}
