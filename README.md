# Practica04-Mi-Agenda-Telef-nica
Practica de PHP y JavaScript

```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
## PRÁCTICA DE LABORATORIO

# CARRERA: COMPUTACION ASIGNATURA: PROGRAMACIÓN HIPERMEDIAL

NRO. PRÁCTICA: 4 TÍTULO PRÁCTICA: Resolución de problemas sobre PHP y MySQL

OBJETIVO ALCANZADO:

- Diseñar adecuadamente elementos gráficos en sitios web en Internet.
- Crear sitios web aplicando estándares actuales.
- Desarrollar aplicaciones web interactivas y amigables al usuario.

```
ACTIVIDADES DESARROLLADAS
```
# 1. Generar el diagrama E-R para la solución de la práctica

2. Crear un repositorio en GitHub con el **nombre “Practica04 – Mi Agenda Telefónica”**
3. Realizar un commit y push por cada requerimiento de los puntos antes descritos.
4. Luego, se debe crear el archivo README del repositorio de GitHub.
5. Generar informe de los resultados en el formato de prácticas. Debe incluir:

```
a) El diagrama E-R de la solución propuesta.
b) Nombre de la base de datos
c) Sentencias SQL de la estructura de la base de datos
d) El desarrollo de cada uno de los requerimientos antes descritos.
e) La evidencia del correcto diseño de las páginas HTML usando CSS. Para lo cuál, se puede generar
fotografías instantáneas (pantallazos).
f) La evidencia del correcto funcionamiento de cada uno de los puntos requeridos.
g) El informe debe incluir conclusiones apropiadas.
h) En el informe se debe incluir la información de GitHub (usuario y URL del repositorio de la práctica)
i) En el informe se debe incluir la firma digital del estudiante.
```
# 6. En el archivo README del repositorio debe constar la misma información del informe de resultados de

la práctica que se indica en el punto anterior.

Se pide desarrollar una aplicación PHP que permita implementar una agenda telefónica en donde un usuario de la
aplicación podrá gestionar su información y la misma estará disponible para el público. Es decir, cada uno de estos
usuarios podrá tener asignado uno o más teléfonos de contacto de diferente tipo y operador, por ejemplo:

- El usuario “Juanito” tiene los teléfonos 0998121212 de tipo celular y operadora Movistar; así como también
    tiene asignado el teléfono 0728222111 de tipo convencional y operador CNT.

Por lo cuál, con base al archivo PHP (Apuntes y ejercicios) se pide realizar los siguientes ajustes:

- Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user”


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
- Crear una tabla para almacenar los teléfonos de los usuarios
- Además, los requerimientos funcionales del sistema son:
- Los usuarios “anónimos” pueden registrarse en la aplicación a través de un formulario de creación de
    cuentas.
- Los usuarios “anónimos” listar los números de teléfono de un usuario usando su número de cédula o correo
    electrónico
- Los usuarios “anónimos” podrá llamar o enviar un correo electrónico desde el sistema usando aplicaciones
    externas.

Un usuario puede iniciar sesión usando su correo y contraseña, y deoendiendo del rol podrá:

```
a) Los usuarios con rol de “admin” pueden: agregar, modificar, eliminar, buscar, listar y cambiar la contraseña
de cualquier usuario de la base de datos.
b) Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario.
c) Los usuarios con rol de “user” pueden agregar, modificar, eliminar, buscar y listar sus teléfonos.
```
Los datos siempre deberán ser validados cuando se trabaje a través de formularios.

De igual manera, se pide manejar sesiones para que existe seguridad en el sistema de agenda telefónica. Por lo
qué, debe existir una parte pública y una privada. Para lo cuál, se debe tener en cuenta:

- Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los
    archivos de la carpeta pública.
- Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin → vista →
    admin; y admin → controladores → admin
- Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user;
    y admin → controladores → user

La parte pública (usuarios anónimos) y privada (usuario registrado) ha sido descrita en los requisitos antes
planteados. Se debe generar una página con la experiencia e interfaz de usuario apropiada, como la que se muestra
a continuación:


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
```
Fig 1. Pagina pública index.html propuesta para el sistema de agenda telefónica
```
RESULTADO(S) OBTENIDO(S):

1. Diagrama E-R


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
2. Repositorio en Github
3. Commit y push en el repositorio de GitHub
4. Crear un archivo README.md


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
5. Realización de los puntos de practicas

```
a. Diagrama E-R
```
Se encuentra en el primer punto.

```
b. Nombre de la Base de Datos
```
GUIA_TELEFONICA

```
c. Sentencias SQL
```
SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM usuario)

INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES
(0,'$numero','$tipo','$operadora','$id')

UPDATE usuario,telefono SET telefono.numero = 'ELIMINADO', telefono.tipo = 'ELIMINADO', telefono.operadora =
'ELIMINADO' WHERE usuario.codigo = telefono.codigo_usuario and `correo` = '$correo'

UPDATE usuario,telefono SET usuario.cedula = '$cedula', usuario.nombres = '$nombres', usuario.apellidos =
'$apellidos', usuario.correo = '$correo', usuario.contrasena = MD5('$contrasena'), telefono.numero =
'$numero', telefono.tipo = '$tipo', telefono.operadora = '$operadora' WHERE $codigo = usuario.codigo AND
usuario.codigo = telefono.codigo_usuario

```
d. Desarrollo de requerimientos
```
- ConexionBD.php

$db_servername = "localhost";

$db_username = "root";

$db_password = "";

$db_name = "guia_telefonica";

El nombre de nuestro servidor será “localhost”, el nombre del usuario y contraseña será la de la base de datos, pero
en este caso no se ha colocado por ende será “root” o si ello; y en el db_name se colocara el nombre de nuestra
base de datos ya creada anteriormente “guía_telefonica”. Ojo el nombre debe ser de esa manera ya que de lo
contario no reconocerá en nuestra página web.

$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
$conn->set_charset("utf8");

# Probar conexión

if ($conn->connect_error) {

die("Connection failed: ". $conn->connect_error);

}else{

//echo "<p>Conexión exitosa!! :)</p>";

}

$conn = new mysqli; nos permitirá conectar con nuestra base de datos y comprobará si se está realizando la
conexión de manera correcta, comprobando sin esta correcto cada uno de los campos previamente mencionados.
Al final lo comprueba dentro de un if el cual mandara un error si la conexión fallo o se logró con éxito.

- INDEX.html

Index.html es nuestra página principal la cual se encuentra el código HTML que lo se lo a realizado en trabajos
anteriores. Por lo que no se tomara en cuenta para esta practica ya que el tema de esta practica es el PHP.
Hablaremos del código HTML, lo esencial; que nos lleva a la dirección de nuestro código PHP.

<a href="php/public/vista/buscar.html"><img id="imagenBuscar" src="images/buscar.png" alt="buscar"></a>

Lo primero que se nos muestra es el código buscar, este se nos redireccionara al hacer click en la imagen en donde
podemos buscar a nuestros datos ingresados ya sea por la cedula y el correo.

<a href="php/public/vista/crear_cuenta.html"><img id="imagenPerfil" src="images/perfil.png" alt="perfil"></a>

La segunda línea de código, es la creación de cuenta la cual se nos direccionara al hacer click.

<a href="php/public/vista/login.html"><img id="imagenCorreo" src="images/correo.png" alt="correo"></a>

Finalmente, el login en el cual si ya tenemos creado nuestro usuario pues podemos logiarnos ya que nuestros datos
se encuentran en la base de datos.

- Crear_cuenta.html


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
La creación de cuenta es el camino principal de nuestra práctica.

Aquí se creará los respectivos cuadros de texto como son: cedula, nombres, apellido, correo electrónico y
contraseña; además de los botones; la misma que nos redireccionará a nuestra página crear_usuario.php.

<form id = "formulario" method = "POST" action = "../controladores/crear_cuenta.php">

Una vez llenada los campos y comprobada la validación de los mismos, al dar click al botón nos llevara a la página
php anteriormente mencionada.

<fieldset>

<legend> CREAR CUENTA </legend>

<label class="labelContacto"> CEDULA* </label><br>

<input type="text" id="txtCedula" name="cedula" placeholder="Ingrese su cedula"
onchange="validarCedula()">

<span id="mensajeCedula"></span><br>

<label class="labelContacto"> NOMBRES* </label><br>

<input type="text" id="txtNombre" name="nombre" placeholder="Ingrese sus nombres"
onkeydown="validarNombre()">

<span id="mensajeNombre"></span><br>

<label class="labelContacto"> APELLIDOS* </label><br>

<input type="text" id="txtApellido" name="apellido" placeholder="Ingrese sus apellidos"
onkeydown="validarApellido()">

<span id="mensajeApellido"></span><br>

<label class="labelContacto"> CORREO ELECTRONICO* </label><br>

<input type="text" id="txtCorreo" name="correo" placeholder="Ingrese su correo"
onkeyup="validarCorreo()">

<span id="mensajeCorreo"></span><br>

<label class="labelContacto"> CONTRASEÑA* </label><br>

<input type="password" id="txtContra" name="contraseña" placeholder="Ingrese su contraseña"
onchange="validarContraseña()">

<span id="mensajeContra"></span><br>

<input type = "button" id = "botonContacto" value="Validar" onclick="validar();">

<input type = "submit" id = "botonContacto1" value="Crear" name = "crear" disabled>


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
</fieldset>

- Crear_cuenta.php

En la parte de nuestro INDEX no llevara en a crear usuario aquí veremos a detalle su código. Lo principal que se
realiza aquí es generar un código a la base de datos sin que este se repita de tal manera que al comprobar el
numero mas alto de nuestra base des datos; a ese se lo sumara uno y se le asignara un nuevo numero en donde
guardara los datos nuevos ingresados. Esto se lo realiza médiate sentencias.

<?php

session_start();

include '../../config/conexionBD.php';

En el inicio nos muestra session_start(); el inicia la sesión PHP y la conexión de donde viene como es de nuestro
include '../../config/conexionBD.php';

$numero = isset($_POST["numero"])? mb_strtoupper(trim($_POST["numero"]), 'UTF-8') : null;

$tipo = isset($_POST["tipo"])? trim($_POST["tipo"]): null;

$operadora = isset($_POST["operadora"])? trim($_POST["operadora"]) : null;

$result = $conn>query("SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM
usuario)");

while ($row = $result->fetch_assoc()) {

$id = $row['codigo'];

}

$sql = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES
(0,'$numero','$tipo','$operadora','$id')";

Para que se logre interactuar con la base de datos nuestras variables serán creadas por el símbolo $ (dólar) y
seguido del nombre que le daremos $numero.

$_POST: Recuperara datos del formulario.


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
? mb_strtoupper: Si le dimos varchar a nuestra base de datos esta se mostrará en mayúscula automáticamente;
los resultados en la página web

Trim: eliminara los espacios que tengamos en blanco.

Isset: Observaremos la variable definida en nuestro script PHP.

$result = $conn>query: conectara a la base de datos la sentencia y lo guardara en la base de datos. Es aquí donde
la sentencia buscara al número máximo de nuestra tabla usuario.

($row = $result->fetch_assoc()): recuperara datos de la matriz $row la obtendrá de la base.

$id = $row['codigo']; Al asociarse los datos estos permitirán el ingreso de datos en la sentencia INSERT INTO.

if ($conn->query($sql) === TRUE) {

header("Location: ../../../index.html");

} else {

if($conn->errno == 1062){

header("Location: ../../public/vista/crear_telefono.html");

}else{

echo "<p class='error'>Error: ". mysqli_error($conn). "</p>";

}

}

$conn->close();

?>

Finalmente se validará si los datos son correctos nos mandra un true y se nos redireccionará a la página de
crear_telefono.html caso contrario nos mandará un error.

- Crear_telefono.html

Luego de crear a nuestro usuario tenemos los datos telefónicos que se les asignara a nuestro usuario. Para ello los
primero que observaremos es nuestro código HTML que es donde se crea la interfaz y por su puesto cada uno de


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
los capos como en donde llenaremos los datos: numero, tipo y operadora; el cual ser asignado a los datos de
nuestro cliente asignado.

<section class="sectionContenido">

<h2 hidden> CONTENIDO </h2>

<form id = "formulario" method = "POST" action = "../controladores/crear_telefono.php">

<fieldset>

<legend> CREAR TELEFONO </legend>

<label class="labelContacto"> NUMERO* </label><br>

<input type="text" id="txtCedula" name="numero" placeholder="Ingrese su nombre">

<span id="mensajeCedula"></span><br>

<label class="labelContacto"> TIPO* </label><br>

<input type="text" id="txtNombre" name="tipo" placeholder="Ingrese sus tipo">

<span id="mensajeNombre"></span><br>

<label class="labelContacto"> OPERADORA* </label><br>

<input type="text" id="txtApellido" name="operadora" placeholder="Ingrese su operadora">

<span id="mensajeApellido"></span><br>

<input type = "submit" id = "botonContacto1" value="Crear" name = "crear">

</fieldset>

</form>

</section>

- Crear_telefono.php

En el código crear teléfono no tenemos nada novedoso. Al igual que nuestro código crear_usuaruo>php; esta tiene
la misma dinámica que es la de ingresar datos de acuerdo al nuevo código asignado dependiendo a ultimo digito
ya ocupado

<?php

session_start();


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
include '../../config/conexionBD.php';

$numero = isset($_POST["numero"])? mb_strtoupper(trim($_POST["numero"]), 'UTF-8') : null;

$tipo = isset($_POST["tipo"])? trim($_POST["tipo"]): null;

$operadora = isset($_POST["operadora"])? trim($_POST["operadora"]) : null;

$result = $conn->query("SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM
usuario)");

while ($row = $result->fetch_assoc()) {

$id = $row['codigo'];

}

$sql = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES
(0,'$numero','$tipo','$operadora','$id')";

if ($conn->query($sql) === TRUE) {

header("Location: ../../../index.html");

} else {

if($conn->errno == 1062){

header("Location: ../../public/vista/crear_telefono.html");

}else{

echo "<p class='error'>Error: ". mysqli_error($conn). "</p>";

}

}

$conn->close();

?>


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Algo particular es el errno == 1062 este se nos muestra cuando existe duplicados.

- Login.html

Una vez ya estemos registrados, nuestros datos se guardan en la base de datos permitiendo ya ingresar al sistema
ya se cómo usuario o cliente.

De la misma forma que el de crar_usuario.html y crear_telefono.htm se realizara la creación del login.htm ya que la
misma se crea los respectivos cuadros de texto para poder validar dicha información; y esto se lograra al aceptar y
login.php verificara dicha información.

<form id = "formulario" method = "POST" action = "../controladores/login.php">

<fieldset>

<legend> INICIAR SESION </legend>

<label class="labelContacto"> CORREO ELECTRONICO* </label><br>

<input type="text" class = "txtForm" id="txtCorreo" name="correo" placeholder="Ingrese su correo">

<span id="mensajeCorreo"></span><br>

<label class="labelContacto"> CONTRASEÑA* </label><br>

<input type="password" class = "txtForm" id="txtContra" name="contraseña" placeholder="Ingrese su
contraseña">

<span id="mensajeContra"></span><br>

<input type = "submit" id = "botonIniciar" value="Iniciar" name = "iniciar">

</fieldset>

</form>

- Login.php

Para la validación de los datos tenemos el campo "SELECT `rol` FROM rol lo que nos permite es dependiendo si
el usuario es administrador(A) o cliente(U); ya que estos definirán los privilegios que tenga cada usuario a la hora
de ingresar al sistema

<?php

session_start();


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
include '../../config/conexionBD.php';

$usuario = isset($_POST["correo"])? trim($_POST["correo"]) : null;

$contrasena = isset($_POST["contraseña"])? trim($_POST["contraseña"]) : null;

$sql = "SELECT `rol` FROM `usuario` WHERE correo = '$usuario' and contrasena = md5('$contrasena')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while ($fila = $result->fetch_assoc()) {

$_SESSION['isLogged'] = TRUE;

if($fila['rol'] == "u"){

header("Location: ../../admin/vista/user/editarDatos.html?correo=". $usuario. "&contrasena=".
md5($contrasena));

}else if($fila['rol'] == "a"){

header("Location: ../../admin/vista/admin/editar.html?correo=". $usuario. "&contrasena=".
md5($contrasena));

}

}

} else {

header("Location: ../vista/login.html");

}

$conn->close();

//echo "<a href='../vista/login.html'>Regresar</a>";

?>

contrasena = md5: Esto se nos permite encriptar la contraseña


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
($fila = $result->fetch_assoc()): Al recorrer los datos en el array comprobaremos e rol que este dispone guardando
en la variable $fila.

if($fila['rol'] == "u"): si nuestro rol es cliente/usuario nos reconocerá como “u” no llevara a la pagina editarDato.html

else if($fila['rol'] == "a"): si nuestro rol se da de que es administrador “a” nos llevara a la pagina editar.html

header("Location: ../vista/login.html"); si el caso no se reconoce pues se nos devuelve la misma página ya que
no coinciden los datos ingresados. Y finalmente cerramos la sentencia if y por ende la script PHP.

- Buscar.html

Nuestro buscador permitirá buscar a usuarios anónimos es decir tanto administradores como clientes y lo realizara
dependiendo al número de la cedula o al correo electrónico ya que estos son datos únicos que no se pueden repetir.

<fieldset>

<legend> BUSCAR </legend>

<label class="labelContacto"> CORREO ELECTRONICO </label><br>

<input type="text" class = "txtForm" id="txtCorreo" name="correo" placeholder="Ingrese el correo a
buscar">

<label class="labelContacto"> CEDULA </label><br>

<input type="text" class = "txtForm" id="txtCedula" name="cedula" placeholder="Ingrese la cedula a
buscar">

<div></div>

<input type = "button" id = "botonBuscar" value= "Buscar" onclick=" buscar()">

<div id="informacion"></div>

</fieldset>

Los resultados se mostraran en la misma página; ya que retornara al mismo sitio

<form id = "formulario" onsubmit="return buscar()">


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
- Buscar.php

Para que nuestro buscador valide los datos sean correctos, obviamente deben estar conectado a nuestra base de
datos y la sentencias adecuadas.

<?php

//incluir conexión a la base de datos

include '../../config/conexionBD.php';

$cedula = $_GET['cedula'];

$correo = $_GET['correo'];

$sql = "SELECT * FROM usuario WHERE correo = '$correo' or cedula = '$cedula'";

$result = $conn->query($sql);

echo " <style>

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


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
$cedula = $_GET['cedula']; Al querer presentar los datos se lo logra mediante la recuperación de las mismas y
se realizara mediante los GET, de la misma manera se lo realizara con la contraseña.

$sql = "SELECT * FROM usuario WHERE correo = '$correo' or cedula = '$cedula'";

$result = $conn->query($sql);

echo " <style>

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

En l sección anterior se usa parte de CSS para poder dar estilo nuestra tabla resultante.

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

echo "<tr>";

echo " <td>". $row['cedula']. "</td>";

echo " <td>". $row['nombres'] ."</td>";


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
echo " <td>". $row['apellidos']. "</td>";

echo " <td>". $row['correo']. "</td>";

echo "</tr>";

}

} else {

echo "<tr>";

echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";

echo "</tr>";

}

echo "</table>";

$conn->close();

En esta sección del código solo nos mostrara los datos que recuperamos como es cedula, nombres, apellidos y
correo todo esto se comprobara dentro de un if su es correcto o caso contrario nos mandara un error de que no
existen usuarios registrados. Es los mismo que se ya ha venido haciendo en otros archivos PHP.

- Agregar.php

El agregar tiene la misma dinámica que el crear_usuario.php; la diferencia esta que en este caso este se lo realizara
dentro del administrador quien se le acceder a este sistema. Por eso no hay necesidad de colocar todo el código
de explicación. Ahora colocaremos la diferencia entre el otro código.

$sql = "INSERT INTO `usuario` VALUES (0,'$cedula','u','$nombres','$apellidos','$correo', MD5('$contrasena'))";

if ($conn->query($sql) === TRUE) {

$result = $conn->query("SELECT codigo FROM usuario WHERE codigo=(SELECT max(codigo) FROM
usuario)");

while ($row = $result->fetch_assoc()) {

$id = $row['codigo'];

}

} else {

if($conn->errno == 1062){

echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
header("Location: ../../vista/admin/editar.html");

}else{

echo "<p class='error'>Error: ". mysqli_error($conn). "</p>";

}

}

echo($id);

$sql1 = "INSERT INTO `telefono`(`codigo`, `numero`, `tipo`, `operadora`, `codigo_usuario`) VALUES
(0,'$numero','$tipo','$operadora','$id')";

if ($conn->query($sql1) === TRUE) {

header("Location: ../../vista/admin/editar.html");

}

En esta sección el administrador tiene acceso a todos estos campos y se podrá agregar de la misma manera y se
comprobara si el usuario ya se ha registrado a fin de evitar duplicación de datos.

Una vez validado los datos se los mandara al editar.html.

Donde el administrador podrá realizar esta modificación ya que es el único que tiene acceso a estos datos y nunca
podrá realizarlo una cuenta que haya sido registrado como usuario.

- Editar.php

El html de este documento al igual que el añadir no lo colocaremos ya que el código es igual al de los anteriores; lo
que no centramos es en el PHP.

El editar es la sección donde se permite al administrador poder modificar, eliminar, agregar, buscar, cambiar
contraseña de todos nuestros usuarios.

A lo largo de este documento ya hemos hablado del buscar y agregar; ahora nos centraremos en los que nos queda
por explicar.

El código se observará de la misma forma que es nuestra tabla agregar

<?php


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

Sección donde obtenemos los valores o datos digitados

$correo = $_GET['correo'];

$contrasena = $_GET['contrasena'];

La sentencia que se realiza es para recuperar los datos usuario y teléfono

$sql = "SELECT u.cedula, u.nombres, u.apellidos, u.correo, u.contrasena, t.numero, t.tipo, t.operadora FROM
usuario u, telefono t WHERE u.codigo = t.codigo_usuario";

$result = $conn->query($sql);

Nuestra sentencia CSS para los cuadros de texto

echo " <style>

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


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
<th>Tipo</th>

<th>Operadora</th>

</tr>";

De tal manera que si los datos son correctos se nos mostrara en la tabla la tabla la cual podemos realizar las
respectivas consultas

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {

echo "<tr>";

echo " <td>". $row['cedula']. "</td>";

echo " <td>". $row['nombres'] ."</td>";

echo " <td>". $row['apellidos']. "</td>";

echo " <td>". $row['correo']. "</td>";

echo " <td>". $row['contrasena']. "</td>";

echo " <td>". $row['numero']. "</td>";

echo " <td>". $row['tipo']. "</td>";

echo " <td>". $row['operadora']. "</td>";

echo "</tr>";

}

} else {

echo "<tr>";

echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";

echo "</tr>";

}

echo "</table>";

echo "<br> <a href='agregar.html'>Agregar</a> <br>";

echo "<br> <a href='eliminar.php'>Modificar</a> <br>";


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
echo "<br> <a href='modificar.php'>Eliminar</a> <br>";

echo "<br> <a href='buscar.php'>Buscar</a> <br>";

echo "<br> <a href='cambiar_contrasena.php'>Cambiar contraseña</a> <br>";

$conn->close();

## ?>

Finalmente, esta nuestras sentencias de modificar, agregar, eliminar, buscar y cambiar su clave.

En el siguiente código JS veremos como se realiza cada uno de estos procedimientos.

- Buscar.js

El buscador nos permitirá buscar por cedula y correo esto lorealizam0os por medio de AJAX

function buscar() {

var cedula = document.getElementById("txtCedula").value;

var correo = document.getElementById("txtCorreo").value;

if (cedula != ""){

if (window.XMLHttpRequest) {

// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp = new XMLHttpRequest();

} else {

// code for IE6, IE5

xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange = function() {

if (this.readyState == 4 && this.status == 200) {

//alert("llegue cedula");

document.getElementById("informacion").innerHTML = this.responseText;


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
## }

## };

xmlhttp.open("GET","../controladores/buscar.php?cedula="+cedula+"&correo=NULL",true);

xmlhttp.send();

window.XMLHttpRequest: se puede actualizar las partes de los datos de la página web sin tener que volver cargar
los datos de la página web.

document.getElementById: esto nos devolverá el elemento que deseemos en este caso muestra cedula y correo.

ActiveXObject("Microsoft.XMLHTTP"); Este es una validación de Internet Explorer para admitir el tipo
XMLHttpRequest.

.onreadystatechange estos son controladores que serán llamados cuando readystatechange esta activo; es decir
cada vez que readyState admite cambios.

this.readyState == 4 && this.status == 200): Lo que esta realizando es validar de acuerdo a los códigos del Ajax.

En fin lo que está realizando esta sentencia es validar datos de la cedula en función a lo que hayamos digitado.

} else if (correo != "") {

if (window.XMLHttpRequest) {

// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp = new XMLHttpRequest();

} else {

// code for IE6, IE5

xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange = function() {

if (this.readyState == 4 && this.status == 200) {


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
//alert("llegue correo");

document.getElementById("informacion").innerHTML = this.responseText;

}

};

xmlhttp.open("GET","../controladores/buscar.php?correo="+correo+"&cedula=NULL",true);

xmlhttp.send();

}

return false;

}

Es así que de la misma forma se mostraran los resultados de la validación del correo y lo veremos reflejado en
nuestro GET donde muestra los datos; si este caso no se da pues nos retorna un false.

- Editar.js

function editar() {

let params = new URLSearchParams(location.search);

var correo = params.get('correo');

var contra = params.get('contrasena');

if (correo != "" && contra != ""){

if (window.XMLHttpRequest) {

// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp = new XMLHttpRequest();

} else {

// code for IE6, IE5

xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange = function() {


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
if (this.readyState == 4 && this.status == 200) {

//alert("llegue cedula");

document.getElementById("informacion").innerHTML = this.responseText;

}

};

xmlhttp.open("GET","../../controladores/admin/editar.php?correo="+correo+"&contrasena="+contra,true);

xmlhttp.send();

## }

return false;

}

URLSearchParams(location.search); este código nos permite trabajar con cadenas de datos.

params.get: obtiene datos

correo != "" && contra != ""): si los datos tanto de correo como contraseña son correctos pues estos validaran

Desde aquí tal como el código de buscar funciona este método Ajax; el cual permitirá modificar/modificar una vez
reconocido la sentencia.

```
e. Pantallazos de Paginas
```
Index.html


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Buscar.html

Crear cuenta.html


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Iniciar Sesion.html

```
f. Correcto Funcionamiento
```
Listar Personas Admin


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Agregar Usuario


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Buscar Persona


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
Cambiar Contraseña

```
g. Información de GitHub
```
Nombre de la practica: Practica04-Mi-Agenda-Telefonica

Url del repositorio: https://github.com/PedroOrellana98/Practica04-Mi-Agenda-Telefonica.git

Nombre de perfil: PedroOrellana98

CONCLUSIONES:

El uso se scripts y php ayuda a la interacción del usuario con la página, los scripts pueden definir varias funciones
y no es necesario que se ejecuten todas para su funcionamiento en la página, la función de php es de brindar datos
que se ingresan en la base de datos para que trabaje el usuario.


```
CONSEJO ACADÉMICO Aprobación: 2016 / 04 / 06
Formato: Guía de Práctica de Laboratorio / Talleres / Centros de Simulación
```
## RECOMENDACIONES:

Una de las páginas que más me ayudaron a comprender el uso de JavaScript y ejemplos de ejecuciones de
funciones es https://www.w3schools.com/js/default.asp.

```
Nombre de estudiante: Pedro José Orellana Jaramillo
```
```
Firma de estudiante:
```


