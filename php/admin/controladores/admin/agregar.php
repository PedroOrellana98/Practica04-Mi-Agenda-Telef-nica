!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar en Usuario</title>
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
        $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;      
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;       
        $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
        $numero = isset($_POST["numero"]) ? trim($_POST["numero"], 'UTF-8') : null;
        $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
        $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null;

        $sql = "INSERT INTO `usuario` VALUES (0,'$cedula','u','$nombres','$apellidos','$correo', MD5('$contrasena'))";
        if ($conn->query($sql) === TRUE) {
            $result = $conn->query("SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM usuario)");
            while ($row = $result->fetch_assoc()) {
                $id = $row['codigo'];
            }
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";  
                header("Location: ../../vista/admin/editar.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        }

        echo($id);

        $sql1 = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES (0,'$numero','$tipo','$operadora','$id')";
        if ($conn->query($sql1) === TRUE) {
            header("Location: ../../vista/admin/editar.html");
        }

         
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 