<?php
$finalidade = $_POST['finalidade'];
if (!empty($finalidade)) {
    $result_finalidade = "INSERT INTO finalidade (finalidade) VALUES ('$finalidade')";
    $resultado_finalidade = mysqli_query($con, $result_finalidade);
} 
return false;

if (mysqli_affected_row($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>A finalidade cadastrado com sucesso</p>";
    header("location:finalidade.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A finalidade não foi cadastrado </p>";
    header("location:finalidade.php");
}

?>