<?php
session_start();
include_once("connection.php");
include_once("functions.php");
$user_data = check_login($con);



$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuarios = "SELECT * FROM users WHERE id = '$id'";
$resultado_usuarios = mysqli_query($con, $result_usuarios);
$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" href="https://ava.unisanta.br/theme/image.php/boost/theme/1563370339/favicon">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <title>Editar Usuarios</title>
</head>

<body>
    <div id="corpo-form-Cad">
        <a href="logout.php">Sair</a><br>
        <a href="menuLogado.php">Voltar ao Menu</a>
        <h1>Editar usuarios</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
       $id = $_SESSION['use_id'];
       $result_usuario = "SELECT * from users WHERE use_id = '$id' limit 1";
       $resultado_usuario = mysqli_query($con, $result_usuario);
       while ($row = mysqli_fetch_assoc($resultado_usuario)) {
       if ($row['nivel'] == '5'){         
            ?>
        <form method="POST" action="proc_edit_usuarios.php">
            <input type="hidden" name="id" value="<?php echo $row_usuarios['id']; ?>">
            <label for="nome">Usuario</label> <input type="text" name="use_name" id="usuario" value="<?php echo $row_usuarios['use_name']; ?>" required>
            <label for="email">Email</label> <input type="text" name="email" id="email" value="<?php echo $row_usuarios['email']; ?>" required>
            <label for="nivel">Nivel</label><input type="text" name="nivel" id="nivel" value="<?php echo $row_usuarios['nivel']; ?>" required>
            <input type="submit" value="Editar"> <br> <br>
        <?php
    }
        else if($row['nivel'] == '1' || $row['nivel'] == '2' || $row['nivel'] == '3') {
		echo "<h2>" ."Você não pode acessar essa página"."</h2>";
}
}
 ?>

    </form>
    </div>
</body>
</html>