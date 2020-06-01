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

        $cedula = $_GET['cedula'];
        $correo = $_GET['correo'];
        $nombres = mb_strtoupper($_GET["nombres"]);
        $apellidos = mb_strtoupper($_GET["apellidos"]);
        $sql = "UPDATE usuario SET cedula = '$cedula', nombres = '$nombres', apellidos = '$apellidos', correo = '$correo' WHERE '$correo' = usuario.correo";
        
        if ($conn->query($sql) == TRUE) {
            header("Location: ../../../public/vista/login.html");
        } else {
            if($conn->errno == 1062){
                echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";  
                header("Location: ../../vista/user/modificarU.html");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }            
        } 
        //cerrar la base de datos
        $conn->close();
        
    ?>
    </body>
</html> 