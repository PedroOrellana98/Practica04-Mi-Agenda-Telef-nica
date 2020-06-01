!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Telefono</title>
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

        $numero = $_GET['numero'];
        $correo = $_GET['correo'];
        $tipo = $_GET["tipo"];
        $operadora = $_GET["opera"];
        $sql = "UPDATE usuario,telefono SET telefono.numero = '$numero', telefono.tipo = '$tipo', telefono.operadora = '$operadora' WHERE '$correo' = usuario.correo AND usuario.codigo = telefono.codigo_usuario";
        
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                header("Location: ../../vista/user/modificarT.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        } 
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 