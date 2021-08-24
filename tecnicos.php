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
    <title>Cadastrar Tecnicos</title>
</head>

<body>

    <div id="corpo-form-Cad">
        <h1>Cadastrar Tecnicos</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST">
            <label for="tecnicos">Nome do Técnico</label> <input type="text" name="tecnicos" id="tecnicos" required="">
            <input id="button" type="submit" value="Cadastrar">
            <br>
            <a href="menuLogado.php">Voltar ao Menu</a><br>
            <a href="logout.php" id="logoutTelaPrincipal">Sair</a>
        </form>
    </div>
</body>

</html>
