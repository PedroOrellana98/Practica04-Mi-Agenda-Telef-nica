<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
</head>
<body>
    
    <table style="width:100%">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th> 
            <th>Apellidos</th>           
            <th>Correo</th>         
        </tr>

        <?php
            include '../../../config/conexionBD.php'; 
            $sql = "SELECT * FROM usuario";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "   <td>" . $row["cedula"] . "</td>";
                    echo "   <td>" . $row['nombres'] ."</td>";
                    echo "   <td>" . $row['apellidos'] . "</td>";
                    echo "   <td>" . $row['correo'] . "</td>";      
                    //echo "   <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
                    //echo "   <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                    //echo "   <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";                                                                    
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                echo "</tr>";

            }
            $conn->close();         
        ?>
    </table>    

</body>
</html> 