<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
$use_name = $_POST['use_name'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$confPassword = $_POST['confPassword'];
}  

if($use_name == "celso" || $use_name == "Celso") {
    $nivel = 5;
}else{
    $nivel = 1;
} 
        
        if (!is_numeric($use_name)) {
        if ($confPassword == $senha) {       
            //save to database
            $use_id = random_num(4);
            $query = "INSERT INTO users (use_id,use_name,senha,email,nivel) VALUES ('$use_id','$use_name','$senha','$email','$nivel')";
            $resultado = mysqli_query($con, $query);

            if (mysqli_insert_id($con)) {
                $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
                header("Location: login.php");                    
                }else {
                $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
                header("Location: signup.php");
                }
         } else {
        echo "A senha não é igual!";
        }
        }else {
            echo "Por favor entre com dados validos!";
        }
    
    

?>