<?php

    
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    
    $correo = $_GET['correo'];
    $contrasena = $_GET['contrasena'];
    

    $sql = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";

    $result = $conn->query($sql);
    echo "    <style>
                    table, th, td {
                        margin-top: 20px;
                        border: 1px solid white;
                    }
                </style>

                <table>
                <tr>
                    <th>Cedula</th>
                    <th>Nombres</th> 
                    <th>Apellidos</th>          
                    <th>Correo</th>    
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row['cedula'] . "</td>";
            echo "   <td>" . $row['nombres'] ."</td>";
            echo "   <td>" . $row['apellidos'] . "</td>";
            echo "   <td>" . $row['correo'] . "</td>";
            echo "   <td> <a href='eliminar.php?cedula=" . $row['cedula'] . "'>Agregar</a> </td>";
            echo "   <td> <a href='eliminar.php?cedula=" . $row['cedula'] . "'>Modificar</a> </td>";
            echo "   <td> <a href='modificar.php?cedula=" . $row['cedula'] . "'>Eliminar</a> </td>";
            echo "   <td> <a href='buscar.php?cedula=" . $row['cedula'] . "'>Buscar</a> </td>";
            echo "   <td> <a href='cambiar_contrasena.php?cedula=" . $row['cedula'] . "'>Cambiar
            contraseña</a> </td>";                   
            echo "</tr>";   
        }        
    } else {        
        echo "<tr>";
        echo "   <td colspan='7'> No existen usuarios registradas en el sistema </td>";
        echo "</tr>";     
    }
    echo "</table>";
    $conn->close(); 
  
?> 