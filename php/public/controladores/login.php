<?php
    session_start();

    include '../../config/conexionBD.php';

    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;

    $sql = "SELECT `correo`, `contrasena` FROM `usuario` WHERE correo = '$usuario' and contrasena =  md5('$contrasena')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($fila = $result->fetch_assoc()) {
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../../admin/vista/usuario/index.php?correo=$usuario");
            //header("Location: ../../admin/vista/usuario/index.php");
        }
    } else {
        header("Location: ../vista/login.html");
    }

    $conn->close();
    echo "<a href='../vista/login.html'>Regresar</a>";
?>
