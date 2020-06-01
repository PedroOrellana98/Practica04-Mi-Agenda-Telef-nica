!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Eliminar Telefono</title>
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
        $sql = "UPDATE usuario,telefono SET telefono.numero = 'ELIMINADO', telefono.tipo = 'ELIMINADO', telefono.operadora = 'ELIMINADO' WHERE usuario.codigo = telefono.codigo_usuario and `correo` =  '$correo'";
        
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                header("Location: ../../vista/user/eliminarT.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        } 
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 