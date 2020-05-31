!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
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
        intval($codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]) : null);
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;      
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;       
        $contrasena = isset($_POST["contraseña"]) ? trim($_POST["contraseña"]) : null;
        $numero = isset($_POST["numero"]) ? trim($_POST["numero"], 'UTF-8') : null;
        $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
        $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null;

        $sql = "UPDATE usuario,telefono SET usuario.cedula = '$cedula', usuario.nombres = '$nombres', usuario.apellidos = '$apellidos', usuario.correo = '$correo', usuario.contrasena = MD5('$contrasena'), telefono.numero = '$numero', telefono.tipo = '$tipo', telefono.operadora = '$operadora' WHERE $codigo = usuario.codigo AND usuario.codigo = telefono.codigo_usuario";
        
        if ($conn->query($sql) == TRUE) {
                header("Location: ../../vista/admin/editar.html");
        } else {
            if($conn->errno == 1062){
                header("Location: ../../vista/admin/modificar.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        }

        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 