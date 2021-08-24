<?php
    $lugar = $_POST['lugar'];
    if (!empty($lugar)) {
    $result_lugar = "INSERT INTO lugar (lugar) VALUES ('$lugar')";
    $resultado_lugar = mysqli_query($con, $result_lugar);
    } 
    return false;

if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Lugar cadastrado com sucesso</p>";
    header("Location:lugar.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Lugar não foi cadastrado com sucesso</p>";
    header("Location:lugar.php");
}
?>