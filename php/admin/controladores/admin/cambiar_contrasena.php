!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;
        }
    </style>
</head>
    <body>
    <?php
        //incluir conexión a la base de datos
        
        include '../../../config/conexionBD.php';
        
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
        $sql = "UPDATE `usuario` SET `contrasena` =  MD5('$contrasena') WHERE `cedula` =  '$cedula'";
        
        if ($conn->query($sql) == TRUE) {
                header("Location: ../../vista/admin/editar.html");
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";  
                header("Location: ../../vista/admin/editar.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        }

        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 