<?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';

    //$correo = $_GET['correo'];
    $numero = $_GET['numero'];

    $sql = "SELECT numero, tipo, operadora FROM telefono WHERE numero = '$numero'";

    $result = $conn->query($sql);
    echo "    <style>
                    table, th, td {
                        margin-top: 20px;
                        border: 1px solid white;
                    }
                </style>

                <table>
                <tr>
                    <th>Numero</th>
                    <th>Tipo</th>
                    <th>Operadora</th> 
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row['numero'] . "</td>";
            echo "   <td>" . $row['tipo'] . "</td>";
            echo "   <td>" . $row['operadora'] . "</td>";                
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