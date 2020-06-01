var contN;
var contA;
var contC;
var contI;
var contN;
var contT;
var contO;

function editarU() {
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
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue cedula");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../controladores/user/editarU.php?correo="+correo+"&contrasena="+contra,true);
        xmlhttp.send();

    }
    return false;
}

function contraU(){

    let params = new URLSearchParams(location.search);
    var correo = params.get('correo');
    var contrasena = document.getElementById("txtContra").value;

    if (correo != ""){ 
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
            }
        };

        xmlhttp.open("GET","../../controladores/user/cambiar_contrasenaU.php?correo="+correo+"&contrasena="+contrasena,true);
        xmlhttp.send();

    }
    return false;

}

function eliminarU(){

    let params = new URLSearchParams(location.search);
    var correo = params.get('correo');

    if (correo != ""){ 
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
            }
        };

        xmlhttp.open("GET","../../controladores/user/eliminarU.php?correo="+correo,true);
        xmlhttp.send();

    }
    return false;

}

function modificarU(){

    let params = new URLSearchParams(location.search);
    var correo = params.get('correo');
    var cedula = document.getElementById("txtCedula").value;
    var nombre = document.getElementById("txtNombre").value;
    var apellido = document.getElementById("txtApellido").value;

    if (correo != ""){ 
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
            }
        };

        xmlhttp.open("GET","../../controladores/user/modificarU.php?correo="+correo+"&cedula="+cedula+"&nombres="+nombre+"&apellidos="+apellido,true);
        xmlhttp.send();

    }
    return false;

}

function modificarT(){

    let params = new URLSearchParams(location.search);
    var correo = params.get('correo');
    var numero = document.getElementById("txtNumero").value;
    var tipo = document.getElementById("txtTipo").value;
    var opera = document.getElementById("txtOpera").value;

    if (correo != ""){ 
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
            }
        };

        xmlhttp.open("GET","../../controladores/user/modificarT.php?correo="+correo+"&numero="+numero+"&tipo="+tipo+"&opera="+opera,true);
        xmlhttp.send();

    }
    return false;

}

function validarNumero(){
    telefono = document.getElementById("txtNumero").value;

    if (isNaN(telefono) || telefono.length > 10) {
        document.getElementById('txtNumero').style.color = "red";
        document.getElementById('mensajeNumero').innerHTML = "<br>Numero invalido"
        contN = 0;
    }else{
        document.getElementById('txtNumero').style.color = "black";
        document.getElementById('mensajeNumero').innerHTML = "<br hidden>"
        contN = 1;
    }
}

function validarTipo(){
    tipo = document.getElementById("txtTipo").value;

    if (isNaN(tipo) && tipo.length > 3)  {
        document.getElementById('txtTipo').style.color = "black";
        document.getElementById('mensajeTipo').innerHTML = "<br hidden>"
        contT = 1;
    }else{
        document.getElementById('txtTipo').style.color = "red";
        document.getElementById('mensajeTipo').innerHTML = "<br>Tipo invalido"
        contT = 0;
    }
}

function validarOperadora(){
    opera = document.getElementById("txtOpera").value;

    if (isNaN(opera) && opera.length > 3)  {
        document.getElementById('txtOpera').style.color = "black";
        document.getElementById('mensajeOpera').innerHTML = "<br hidden>"
        contO = 1;
    }else{
        document.getElementById('txtOpera').style.color = "red";
        document.getElementById('mensajeOpera').innerHTML = "<br>Operadora invalida"
        contO = 0;
    }
}

function validarCedula(){
    cedula = document.getElementById("txtCedula").value
    total = 0;
    longcheck = cedula.length - 1;

    if (cedula.length == 10) {
        for (i = 0; i < longcheck; i++) {
            if (i % 2 === 0) {
                var aux = cedula.charAt(i) * 2;
                if (aux >= 10) aux -= 9;
                total += aux;
            } else {
                total += parseInt(cedula.charAt(i));
            }
        }
        total = total % 10 != 0 ? 10 - total % 10 : 0;

        if (cedula.charAt(cedula.length - 1) == total) {
            document.getElementById('txtCedula').style.color = "black";
            document.getElementById('mensajeCedula').innerHTML = "<br hidden>"
            contI = 1;
            return false;
        } else {
            document.getElementById('txtCedula').style.color = "red";
            document.getElementById('mensajeCedula').innerHTML = "<br>Cedula Invalida"
            contI = 0;
            return true;
        }
    } else {
        document.getElementById('txtCedula').style.color = "red";
        document.getElementById('mensajeCedula').innerHTML = "<br>Cedula Invalida"
        contI = 0;
        return false;
    }

}

function validarNombre(){
    nombre = document.getElementById("txtNombre").value;
    nombreS = nombre.replace(/ /g, ""); 

    if (isNaN(nombre) && (nombre != nombreS) && (nombre.slice(-1) != " ")) {
        document.getElementById('txtNombre').style.color = "black";
        document.getElementById('mensajeNombre').innerHTML = "<br hidden>"
        contN = 1;
    }else{
        document.getElementById('txtNombre').style.color = "red";
        document.getElementById('mensajeNombre').innerHTML = "<br>Nombre invalido"
        contN = 0;
    }
}

function validarApellido(){
    apellido = document.getElementById("txtApellido").value;
    apellidoS = apellido.replace(/ /g, "");

    if (isNaN(apellido) && (apellido != apellidoS) && (apellido.slice(-1) != " ")) {
        document.getElementById('txtApellido').style.color = "black";
        document.getElementById('mensajeApellido').innerHTML = "<br hidden>"
        contA = 1;
    }else{
        document.getElementById('txtApellido').style.color = "red";
        document.getElementById('mensajeApellido').innerHTML = "<br>Apellido invalido"
        contA = 0;
    }
}

function validarCorreo(){
    array = document.getElementById('txtCorreo').value.split('@');

    if (array[0].length < 3) {
        document.getElementById('txtCorreo').style.color = "red";
        document.getElementById('mensajeCorreo').innerHTML = "<br>Correo invalido"
        contC = 0;
    } else {
        if (!(array[1] == 'ups.edu.ec') && !(array[1] == 'est.ups.edu.ec')) {
            document.getElementById('txtCorreo').style.color = "red";
            document.getElementById('mensajeCorreo').innerHTML = "<br>Correo invalido"
            contC = 0;
        } else {
            document.getElementById('txtCorreo').style.color = "black";
            document.getElementById('mensajeCorreo').innerHTML = "<br hidden>"
            contC = 1;
        }
    }
}

function validar1(){

    sum = contN+contA+contC+contI;
    cedula = document.getElementById("txtCedula").value;
    nombre = document.getElementById("txtNombre").value;
    apellido = document.getElementById("txtApellido").value;
    correo = document.getElementById("txtCorreo").value;

    if (cedula.length < 1) {
        alert("Campo Cedula vacio");
    }
    if (nombre.length < 1) {
        alert("Campo Nombres vacio");
    }
    if (apellido.length < 1) {
        alert("Campo Apellidos vacio");
    }
    if (correo.length < 1) {
        alert("Campo Correo vacio");
    }

    if (sum == 4) {
        boton = document.getElementById("botonContacto");
        boton1 = document.getElementById("botonContacto1");
        boton1.disabled = false
    }else{
        alert("Revise sus campos");
        location.href='modificarU.html';
    }

}

function validar2(){

    sum = contN+contT+contO;
    telefono = document.getElementById("txtNumero").value;
    tipo = document.getElementById("txtTipo").value;
    opera = document.getElementById("txtOpera").value;

    if (telefono.length < 1) {
        alert("Campo Telefono vacio");
    }
    if (tipo.length < 1) {
        alert("Campo Tipo vacio");
    }
    if (opera.length < 1) {
        alert("Campo Operadora vacio");
    }

    if (sum == 3) {
        boton = document.getElementById("botonContacto");
        boton1 = document.getElementById("botonContacto1");
        boton1.disabled = false
    }else{
        alert("Revise sus campos");
        location.href='modificarT.html';
    }

}