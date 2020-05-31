<?php

    
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    
    $correo = $_GET['correo'];
    $contrasena = $_GET['contrasena'];
    

    //$sql = "SELECT * FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $sql = "SELECT u.codigo, u.cedula, u.nombres, u.apellidos, u.correo, u.contrasena, t.numero, t.tipo, t.operadora FROM usuario u, telefono t WHERE u.codigo = t.codigo_usuario";
    $result = $conn->query($sql);
    echo "    <style>
                    table, th, td {
                        margin-top: 20px;
                        border: 1px solid white;
                    }
                </style>

                <table>
                <tr>
                    <th>Codigo</th>
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
            echo "   <td>" . $row['codigo'] . "</td>";
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
    echo "<br> <a href='agregar.html'>Agregar</a> <br>";
    echo "<br> <a href='modificar.html'>Modificar</a> <br>";
    echo "<br> <a href='eliminar.html'>Eliminar</a> <br>";
    echo "<br> <a href='buscarP.html'>Buscar</a> <br>";
    echo "<br> <a href='cambiar_contrasena.html'>Cambiar contraseña</a> <br>";
    
    $conn->close(); 
  
?> 