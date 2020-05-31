<?php
    session_start();

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;

    $sql = "SELECT `rol` FROM `usuario` WHERE correo = '$usuario' and contrasena =  md5('$contrasena')";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $_SESSION['isLogged'] = TRUE;
            if($fila['rol'] == "u"){
                header("Location: ../../admin/vista/user/editarU.html?correo=" . $usuario . "&contrasena=" . md5($contrasena));
            }else if($fila['rol'] == "a"){
                header("Location: ../../admin/vista/admin/editar.html?correo=" . $usuario . "&contrasena=" . md5($contrasena));
            }
        }
    } else {
        header("Location: ../vista/login.html");
    }

    $conn->close();
    //echo "<a href='../vista/login.html'>Regresar</a>";
?>
