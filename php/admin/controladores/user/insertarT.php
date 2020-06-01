!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insertar Telefono</title>
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
        $numero = $_GET['numero'];
        $tipo = $_GET["tipo"];
        $operadora = $_GET["opera"];
        $result = $conn->query("SELECT codigo FROM usuario WHERE correo = $correo");
        while ($row = $result->fetch_assoc()) {
                $id = $row['codigo'];
        }
        $sql = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES (0,'$numero','$tipo','$operadora','$id')";
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                header("Location: ../../vista/user/insertarT.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        } 
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 