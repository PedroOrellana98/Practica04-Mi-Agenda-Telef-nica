var contN;
var contT;
var contO;

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
    opera = document.getElementById("txtOperadora").value;

    if (isNaN(opera) && opera.length > 3)  {
        document.getElementById('txtOperadora').style.color = "black";
        document.getElementById('mensajeOperadora').innerHTML = "<br hidden>"
        contO = 1;
    }else{
        document.getElementById('txtOperadora').style.color = "red";
        document.getElementById('mensajeOperadora').innerHTML = "<br>Operadora invalida"
        contO = 0;
    }
}

function validar(){

    sum = contN+contT+contO;
    telefono = document.getElementById("txtNumero").value;
    tipo = document.getElementById("txtTipo").value;
    opera = document.getElementById("txtOperadora").value;

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
        location.href='crear_telefono.html';
    }

}