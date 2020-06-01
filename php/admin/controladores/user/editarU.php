<?php

    
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    
    $correo = $_GET['correo'];
    $contrasena = $_GET['contrasena'];
    

    $sql = "SELECT u.cedula, u.nombres, u.apellidos, u.correo, u.contrasena, t.numero, t.tipo, t.operadora FROM usuario u, telefono t WHERE  u.codigo = t.codigo_usuario AND correo = '$correo' AND contrasena = '$contrasena'";
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
                    <th>Contraseña</th>
                    <th>Numero</th>
                    <th>Tipo</th>
                    <th>Operadora</th> 
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row['cedula'] . "</td>";
            echo "   <td>" . $row['nombres'] ."</td>";
            echo "   <td>" . $row['apellidos'] . "</td>";
            echo "   <td>" . $row['correo'] . "</td>";
            echo "   <td>" . $row['contrasena'] . "</td>";
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
    echo "<br> <a href='modificarU.html?correo=". $correo ."'>Modificar Usuario</a> <br>";
    echo "<br> <a href='eliminarU.html?correo=". $correo ."'>Eliminar Usuario</a> <br>";
    echo "<br> <a href='cambiar_contrasenaU.html?correo=". $correo ."'>Cambiar Contraseña</a> <br>";
    echo "<br> <a href='insertarT.html?correo=". $correo ."' >Agregar Telefono</a> <br>";
    echo "<br> <a href='modificarT.html?correo=". $correo ."'>Modificar Telefono</a> <br>";
    echo "<br> <a href='eliminarT.html?correo=". $correo ."'>Eliminar Telefono</a> <br>";
    echo "<br> <a href='buscarT.html?correo=". $correo ."'>Buscar Telefono</a> <br>";
    
    $conn->close(); 
  
?> 