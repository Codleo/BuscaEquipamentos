<?php
session_start();
include("connection.php");
include("functions.php");
/*
        if ($user_data = check_login($con)) {
        $result_usuario = "SELECT use_name,nivel FROM users ";
         $resultado_usuario = mysqli_query($con, $result_usuario);
        echo "Bem vindo <b>" . $resultado_usuario['use_name'] . "</b> Seu nível é <b>" . $resultado_usuario['nivel'] . "</b> nesse sistema!";
        }
        */

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <title>Menu</title>
</head>

<body>

    <div id="corpo-form-Cad">
        <h1>Menu</h1>
        <br>
        <a href="cadastrarEquipamentos.php">Cadastrar Equipamentos</a> <br>
        <a href="buscarEquipamentos.php">Logar</a> <br>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

    </div>
</body>

</html>