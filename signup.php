<?php
session_start();

include("connection.php");


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastrar</title>
</head>

<body>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
    <div id="corpo-form-Cad">
        <H1>Cadastrar</H1>
        <form method="POST" action="proc_cad_usuarios.php">

            <label for="use_name">Nome do usuario </label><input type="text" name="use_name" id="use_name" required><br>
            <label for="email">Email</label><input type="type" name="email" id="email" required> <br>
            <label for="senha">Senha</label><input type="password" name="senha" id="senha" required><br>
            <label for="confPassword">Confirmar Senha</label><input type="password" name="confPassword" id="confPassword" required>         
            <input type="submit" value="Cadastrar"><br>

            <a href="login.php">Clique para logar</a>
        </form>
    </div>
</body>

</html>