<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastrar Finalidade</title>
</head>

<body>

    <div id="corpo-form-Cad">
        <h1>Cadastrar Finalidade</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST">
            <label for="finalidade">Finalidade</label> <input type="text" name="finalidade" id="finalidade" required="required">
            <input id="button" type="submit" value="Cadastrar">
            <br>
            <a href="menuLogado.php">Voltar ao Menu</a><br>
            <a href="logout.php" id="logoutTelaPrincipal">Sair</a>
        </form>
    </div>
</body>

</html>
<?php
$finalidade = $_POST['finalidade'];
if (!empty($finalidade)) {
    $result_finalidade = "INSERT INTO finalidade (finalidade) VALUES ('$finalidade')";
    $resultado_finalidade = mysqli_query($con, $result_finalidade);
} 
return false;

if (mysqli_affected_row($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("location:menuLogado.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("location:finalidade.php");
}

?>