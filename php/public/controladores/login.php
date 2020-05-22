<?php
    session_start();

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
    
    $sql = "SELECT usu_correo, usu_password FROM usuario WHERE usu_correo = '$usuario' and usu_password =  md5('$contrasena')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $_SESSION['isLogged'] = TRUE;
            //printf ("%s (%s)\n", $fila["usu_correo"], $fila["usu_password"]);
            header("Location: ../../admin/vista/usuario/index.php");
        }
    } else {  
        echo "Mal ingresado";
        header("Location: ../vista/login.html");
    }

    //$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
    //$sql1 = "SELECT usu_correo, usu_password FROM usuario";

    //$result = $conn->query($sql);       
    //$result1 = $conn->query($sql1);

    /*$sql = "SELECT usu_correo, usu_password FROM usuario";
    $result = $conn->query($sql);

    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }else {
        while ($fila = $result->fetch_assoc()) {
            printf ("%s (%s)\n", $fila["usu_correo"], $fila["usu_password"]);
        }
    }*/
?>
