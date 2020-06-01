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