<?php
    session_start();

    include '../../config/conexionBD.php';

    $numero = isset($_POST["numero"]) ? mb_strtoupper(trim($_POST["numero"]), 'UTF-8') : null;      
    $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]): null;       
    $operadora = isset($_POST["operadora"]) ? trim($_POST["operadora"]) : null;
    
    $result = $conn->query("SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM usuario)");

    while ($row = $result->fetch_assoc()) {
        $id = $row['codigo'];
    }

    $sql = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES (0,'$numero','$tipo','$operadora','$id')";        
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamemte!!!</p>";     
    } else {
        if($conn->errno == 1062){
            echo "<p>No ha creado los datos del telefono</p>";     
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }            
    }

    $conn->close();
    echo "<a href='../vista/crear_cuenta.html'>Regresar</a>";
?>
