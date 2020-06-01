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

        $correo = $_GET['correo'];
        $contrasena = $_GET['contrasena'];
        $sql = "UPDATE `usuario` SET `contrasena` =  MD5('$contrasena') WHERE `correo` =  '$correo'";
        
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                header("Location: ../../vista/user/cambiar_contrasenaU.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        } 
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 