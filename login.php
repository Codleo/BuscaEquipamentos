<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $use_name = $_POST['use_name'];
    $senha = $_POST['senha'];

    if (!is_numeric($use_name)) {

        //read from database
        $query = "SELECT * from users where use_name = '$use_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['senha'] === $senha) {

                    $_SESSION['use_id'] = $user_data['use_id'];
                    header("Location: menuLogado.php");
                    die;
                }
            }
        }        
    } else {
        echo "<p style='color:red;'> Senha ou usuários incorreto!</p>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>

<body>


    <div id="corpo-form-Cad">
        <H1>Login</H1>
        <form method="POST">

            <label for="use_name">Usuario</label><input  type="text" name="use_name" id="use_name" required><br>
            <label for="password">Senha</label><input type="password" name="senha" id="password" required><br>

            <input id="button" type="submit" value="Login"><br>

            <a href="signup.php">Clique para cadastrar</a>
        </form>
    </div>
</body>

</html>