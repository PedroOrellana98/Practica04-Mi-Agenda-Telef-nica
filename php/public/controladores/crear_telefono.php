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
        header("Location: ../../../index.html");
    } else {
        if($conn->errno == 1062){
            header("Location: ../../public/vista/crear_telefono.html");
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }            
    }

    $conn->close();
?>
