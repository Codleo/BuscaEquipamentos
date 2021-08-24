<?php
$tipo = $_POST['tipo'];
if (!empty($tipo)) {
    $result_tipo = "INSERT INTO tipo (tipo) VALUES ('$tipo')";
    $resultado_tipo = mysqli_query($con, $result_tipo);
}
return false;

if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location:menuLogado.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location:tipo.php");
}

?>