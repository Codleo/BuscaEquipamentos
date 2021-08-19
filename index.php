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
        <a href="buscarEquipamentos.php">Clique para buscar algum equipamento</a> <br>
        <a href="buscarEquipamentos.php">Clique para editar algum equipamento</a> <br>
        <a href="tipo.php">Cadastrar Tipo do equipamento</a><br>
        <a href="tecnicos.php">Cadastrar Tecnicos do equipamento</a><br>
        <a href="finalidade.php">Cadastrar Finalidade do equipamento</a><br>
        <a href="lugar.php">Cadastrar Lugar do equipamento</a><br>
        <a href="cadastrarManutencao.php">Cadastrar Ordem de Serviço</a><br>
        <a href="buscarManutencao.php">Clique para buscar alguma Ordem de Serviço</a><br>
        <a href="buscarUsuarios.php">Clique para buscar algum usuarios</a> <br>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

    </div>
</body>

</html>