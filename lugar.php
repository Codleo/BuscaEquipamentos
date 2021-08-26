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
    <title>Cadastrar Lugar</title>
</head>

<body>

    <div id="corpo-form-Cad">
        <h1>Cadastrar Lugar</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" >
            <label for="lugar">Nome do Lugar</label> <input type="text" name="lugar" id="lugar" required="required">
            <input id="button" type="submit" value="Cadastrar">
            <br>
            <a href="menuLogado.php">Voltar ao Menu</a><br>
            <a href="logout.php" id="logoutTelaPrincipal">Sair</a>

        </form>
    </div>
</body>
<?php
    $lugar = $_POST['lugar'];
    if (!empty($lugar)) {
    $result_lugar = "INSERT INTO lugar (lugar) VALUES ('$lugar')";
    $resultado_lugar = mysqli_query($con, $result_lugar);
    } 
    return false;

if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green;'>Lugar cadastrado com sucesso</p>";
    header("Location:menuLogado.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Lugar não foi cadastrado com sucesso</p>";
    header("Location:lugar.php");
}
?>
</html>
