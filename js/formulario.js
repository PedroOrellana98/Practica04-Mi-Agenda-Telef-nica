var contN;
var contA;
var contD;
var contT;
var contF;
var contC;
var contCO;
var contI;

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

function validarDireccion(){
    direccion = document.getElementById("txtDireccion").value;

    if (direccion.length > 1) {
        document.getElementById('txtDireccion').style.color = "black";
        document.getElementById('mensajeDireccion').innerHTML = "<br hidden>"
        contD = 1;
    }else{
        document.getElementById('txtDireccion').style.color = "red";
        document.getElementById('mensajeDireccion').innerHTML = "<br>Direccion invalida"
        contD = 0;
    }
}

function validarTelefono(){
    telefono = document.getElementById("txtTelefono").value;

    if (isNaN(telefono) || telefono.length > 10) {
        document.getElementById('txtTelefono').style.color = "red";
        document.getElementById('mensajeTelefono').innerHTML = "<br>Telefono invalido"
        contT = 0;
    }else{
        document.getElementById('txtTelefono').style.color = "black";
        document.getElementById('mensajeTelefono').innerHTML = "<br hidden>"
        contT = 1;
    }

}

function validarFecha(){
    array = document.getElementById('txtFecha').value.split('/');
    fecha = new Date(array[2], array[1], array[0]);
    
    if (array.length == 3 && fecha && array[0] == fecha.getDate() && array[1] == fecha.getMonth() && array[2] == fecha.getFullYear()) {
        
        document.getElementById('txtFecha').style.color = "black";
        document.getElementById('mensajeFecha').innerHTML = "<br hidden>"
        contF = 1;
    } else {
        document.getElementById('txtFecha').style.color = "red";
        document.getElementById('mensajeFecha').innerHTML = "<br>Fecha invalida formato dd/mm/yyyy"
        contF = 0;
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

function validarContraseña(){
    contra = document.getElementById('txtContra').value

    if(contra.length >= 8)
			{		
				var mayuscula = false;
				var minuscula = false;
				var numero = false;
				var caracter = false;
				
				for(var i = 0;i<contra.length;i++)
				{
					if(contra.charCodeAt(i) >= 65 && contra.charCodeAt(i) <= 90)
					{
                        mayuscula = true;
					}
					else if(contra.charCodeAt(i) >= 97 && contra.charCodeAt(i) <= 122)
					{
                        minuscula = true;
					}
					else if(contra.charCodeAt(i) >= 48 && contra.charCodeAt(i) <= 57)
					{
                        numero = true;
					}
					else
					{
                        caracter = true;
					}
				}
				if(mayuscula == true && minuscula == true && caracter == true && numero == true)
				{
                    contCO = 1;
                    document.getElementById('txtContra').style.color = "black";
                    document.getElementById('mensajeContra').innerHTML = "<br hidden>"
                    return true;
				}
            }
            document.getElementById('txtContra').style.color = "red";
            document.getElementById('mensajeContra').innerHTML = "<br> Contraseña debil se requiere una letra mayuscula, minuscula, numero y caracter especial"
            contCO = 0;
			return false;
}

function validar(){

    sum = contN+contA+contT+contF+contC+contCO+contI+contD;
    cedula = document.getElementById("txtCedula").value;
    nombre = document.getElementById("txtNombre").value;
    apellido = document.getElementById("txtApellido").value;
    direccion = document.getElementById("txtDireccion").value;
    fecha = document.getElementById("txtFecha").value;
    correo = document.getElementById("txtCorreo").value;
    contra = document.getElementById("txtContra").value;

    if (cedula.length < 1) {
        alert("Campo Cedula vacio");
    }
    if (nombre.length < 1) {
        alert("Campo Nombres vacio");
    }
    if (apellido.length < 1) {
        alert("Campo Apellidos vacio");
    }
    if (direccion.length < 1) {
        alert("Campo Direccion vacio");
    }
    if (fecha.length < 1) {
        alert("Campo Fecha vacio");
    }
    if (correo.length < 1) {
        alert("Campo Correo vacio");
    }
    if (contra.length < 1) {
        alert("Campo Contraseña vacio");
    }

    if (sum == 8) {
        location.href='../index.php';
    }else{
        alert("Revise sus campos");
        location.href='formulario.html';
    }

}