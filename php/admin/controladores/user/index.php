<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
</head>
<body>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
    
    <table>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th> 
            <th>Apellidos</th>           
            <th>Correo</th>         
        </tr>

        <?php
            include '../../../config/conexionBD.php'; 

            $correo = isset($_GET["correo"]) ? trim($_GET["correo"]): null;
            $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "   <td>" . $row["cedula"] . "</td>";
                    echo "   <td>" . $row['nombres'] ."</td>";
                    echo "   <td>" . $row['apellidos'] . "</td>";
                    echo "   <td>" . $row['correo'] . "</td>";      
                    echo "   <td> <a href='eliminar.php?codigo=" . $row['codigo'] . "'>Eliminar</a> </td>";
                    echo "   <td> <a href='modificar.php?codigo=" . $row['codigo'] . "'>Modificar</a> </td>";
                    echo "   <td> <a href='cambiar_contrasena.php?codigo=" . $row['codigo'] . "'>Cambiar contraseña</a> </td>";                                                                    
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