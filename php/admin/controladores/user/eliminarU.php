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
        $sql = "UPDATE usuario,telefono SET usuario.cedula = 'ELIMINADO', usuario.nombres = 'ELIMINADO', usuario.apellidos = 'ELIMINADO', usuario.correo = 'ELIMINADO', usuario.contrasena = 'ELIMINADO', telefono.numero = 'ELIMINADO', telefono.tipo = 'ELIMINADO', telefono.operadora = 'ELIMINADO' WHERE usuario.codigo = telefono.codigo_usuario and `correo` =  '$correo'";
        
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";  
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