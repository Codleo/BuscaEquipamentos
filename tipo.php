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
    <title>Cadastrar Tipo</title>
</head>

<body>

    <div id="corpo-form-Cad">
        <h1>Cadastrar Tipo</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST">
            <label for="tipo">Tipo do equipamento</label> <input type="text" name="tipo" id="input_tipo" required="required">
            <input id="button" type="submit" value="Cadastrar">
            <br>
            <a href="menuLogado.php">Voltar ao Menu</a><br>
            <a href="logout.php" id="logoutTelaPrincipal">Sair</a>
        </form>
    </div>
</body>

</html>
<?php
$tipo = $_POST['tipo'];
if (!empty($tipo)) {
    $result_tipo = "INSERT INTO tipo (tipo) VALUES ('$tipo')";
    $resultado_tipo = mysqli_query($con, $result_tipo);
}
return false;

if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
    header("Location:tipo.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
    header("Location:tipo.php");
}

?>