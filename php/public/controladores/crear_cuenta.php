!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;
        }
    </style>
</head>
    <body>
    <?php
        //incluir conexión a la base de datos
        include '../../config/conexionBD.php';  
                      

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;      
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;       
        $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
        $sql = "INSERT INTO `usuario`(`codigo`, `cedula`, `rol`, `nombres`, `apellidos`, `correo`, `contrasena`) VALUES (0,'$cedula','u','$nombres','$apellidos','$correo', MD5('$contrasena'))";        
        
                if ($conn->query($sql) === TRUE) {
                    header("Location: ../../public/vista/crear_telefono.html");
                } else {
                    if($conn->errno == 1062){
                        echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";  
                        header("Location: ../../public/vista/crear_cuenta.html"); 
                    }else{
                        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                    }            
                }
                
                //cerrar la base de datos
                $conn->close();
                echo "<a href='../vista/crear_cuenta.html'>Regresar</a>";
                          
            ?>
        
    </body>
</html> 