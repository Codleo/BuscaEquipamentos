<?php
    $tecnicos = $_POST['tecnicos'];
    if (!empty($tecnicos)) {
    $result_tecnicos = "INSERT INTO tecnicos (tecnicos) VALUES ('$tecnicos')";
    $resultado_tecnicos = mysqli_query($con, $result_tecnicos);
    } 
return false;
if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Tecnico cadastrado com sucesso</p>";
    header("Location:tecnicos.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Tecnico não foi cadastrado com sucesso</p>";
    header("Location:tecnicos.php");
}

?>