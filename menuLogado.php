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
    <title>Menu</title>
</head>

<body>


        <h1>Menu</h1>
        <br>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        $id = $_SESSION['use_id'];
        $result_usuario = "SELECT * from users WHERE use_id = '$id' limit 1";
        $resultado_usuario = mysqli_query($con, $result_usuario);
        while ($row = mysqli_fetch_assoc($resultado_usuario)) {
            echo "<h2>Bem vindo " . $row['use_name'] . "<br>seu nivel é " . $row['nivel'] . "!</h2> <br>";
        if ($row['nivel'] == '5'){
            echo "  
            <div id='corpo-form-Cad'>           
            <a href='buscarEquipamentos.php'>Buscar algum equipamento</a> <br>
            <a href='cadastrarEquipamentos.php'>Cadastrar Equipamentos</a> <br>
            <a href='buscarEquipamentos.php'> Editar algum equipamento</a> <br>            
            <a href='tipo.php'>Cadastrar Tipo do equipamento</a><br>
            <a href='tecnicos.php'>Cadastrar Tecnicos do equipamento</a><br>
            <a href='finalidade.php'>Cadastrar Finalidade do equipamento</a><br>
            <a href='lugar.php'>Cadastrar Lugar do equipamento</a><br>
            </div>
            <div  id='corpo-form-Cad-left'>
            <h2 id='h2-left'>Usuários</h2>
            <a href='buscarUsuarios.php'> Buscar algum usuarios</a><br>            
            </div>
            <div id='corpo-form-Cad-right'> 
            <h2 id='h2-right'>Ordem de Serviço</h2>
            <a href='buscarManutencao.php'>Buscar alguma Ordem de Serviço</a><br>
            <a href='cadastrarManutencao.php'>Cadastrar Ordem de Serviço</a>
            </div>
            ";
        }
        else if($row['nivel'] == '3'){
        echo"
        <div id='corpo-form-Cad'> 
        <a href='buscarEquipamentos.php'>Buscar algum equipamento</a> <br>
        <a href='cadastrarEquipamentos.php'>Cadastrar Equipamentos</a> <br>
        <a href='buscarEquipamentos.php'>Editar algum equipamento</a> <br>
        </div>
        <div id='corpo-form-Cad-left-nivel3'>
        <h2 id='h2-left'>Elementos</h2>
        <a href='tipo.php'>Cadastrar Tipo do equipamento</a><br>
        <a href='tecnicos.php'>Cadastrar Tecnicos do equipamento</a><br>
        <a href='finalidade.php'>Cadastrar Finalidade do equipamento</a><br>           
        <a href='lugar.php'>Cadastrar Lugar do equipamento</a><br>
        </div>
        <div id='corpo-form-Cad-right-nivel3'> 
        <h2 id='h2-right'>Ordem de Serviço</h2>
        <a href='buscarManutencao.php'>Buscar alguma Ordem de Serviço</a><br>
        <a href='cadastrarManutencao.php'>Cadastrar Ordem de Serviço</a><br>
        </div>
        ";
        }
        else if($row['nivel'] == '2'){
            echo "
            <div id='corpo-form-Cad'> 
            <a href='buscarEquipamentos.php'>Clique para buscar algum equipamento</a> <br>
            <a href='cadastrarEquipamentos.php'>Cadastrar Equipamentos</a> <br>
            <a href='buscarEquipamentos.php'>Clique para editar algum equipamento</a> <br>
            </div>
            ";
        }
        else if($row['nivel'] == '1'){
                    
            echo "<div id='corpo-form-Cad'> 
            <a href='cadastrarEquipamentos.php'>Cadastrar Equipamentos</a> <br>
            </div>
            ";
        }
    }
        ?>      
        <a href="logout.php" id="logoutMenu">Sair</a>

</body>

</html>