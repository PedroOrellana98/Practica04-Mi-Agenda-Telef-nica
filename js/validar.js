function validar(){

    cedula = document.getElementById("txtCedula").value;
    nombre = document.getElementById("txtNombre").value;
    apellido = document.getElementById("txtApellido").value;
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
    if (correo.length < 1) {
        alert("Campo Correo vacio");
    }
    if (contra.length < 1) {
        alert("Campo Contraseña vacio");
    }

    
    boton = document.getElementById("botonContacto");
    boton1 = document.getElementById("botonContacto1");
    boton1.disabled = false

}