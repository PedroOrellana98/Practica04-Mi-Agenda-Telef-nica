<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';

    $cedula = $_GET['cedula'];
    
    $sql = "SELECT * FROM usuario WHERE cedula = '$cedula'";

    $result = $conn->query($sql);
    echo "    <table style='width:100%'>
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