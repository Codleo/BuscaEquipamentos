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
        <form method="POST">
            <label for="lugar">Nome do Lugar</label> <input type="text" name="lugar" id="lugar" required="required">
            <input id="button" type="submit" value="Cadastrar">
            <br>
            <a href="menuLogado.php">Voltar ao Menu</a><br>
            <a href="logout.php" id="logoutTelaPrincipal">Sair</a>

        </form>
    </div>
</body>

</html>
