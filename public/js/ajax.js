window.onload = function() {

    /*CODIGO MODAL*/

    // Get the modal
    modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    span = document.getElementsByClassName("close")[0];



    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function abrirModal(id, nombre) {
    modal.style.display = "block";
    document.getElementById('nombreForm').value = nombre;
    document.getElementById('id').value = id;
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

/* Función implementada con AJAX */
function leerJS() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var tabla = document.getElementById("idrestaurante");
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('filtrocontrolador', document.getElementById('leerajaxhtml').value);
    if (typeof id != 'undefined') {
        formData.append('leer_tipo', id);
    }

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "leer", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            var recarga = '';
            /* Leerá la respuesta que es devuelta por el controlador: */
            recarga += '<div id="idrestaurante" class="rest">';
            recarga += '<img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/curve--small.svg" class="landing-highlights-container__curve">';
            recarga += '<br><br><br><br>';
            recarga += '<span class="ttl_rest">Restaurantes</span>';
            recarga += '<div class="res">';
            for (let i = 0; i < respuesta.length; i++) {
                recarga += '<div class="cont_res">';
                recarga += '<div class="tam_res">';
                recarga += '<img src="uploads/' + respuesta[i].img_resta + '" style="width:100%;">';
                recarga += '</div>';
                recarga += '<div class="bar_res">'
                recarga += '<span><b>' + respuesta[i].nombre_resta + '</b></span>';
                recarga += '</div>'
                recarga += '</div>';
            }
            recarga += '</div>'
            recarga += '</div>'

            tabla.innerHTML = recarga;
        }
    }

    ajax.send(formData);
}

/* Función implementada con AJAX que inserta un archivo */
function insertarJS() {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('nombre', document.getElementById('nombre').value);
    formData.append('foto', document.getElementById('foto').files[0]);

    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "crear", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                document.getElementById('mensaje').innerHTML = "Inserción correcta."
            } else {
                document.getElementById('mensaje').innerHTML = "Fallo en la inserción: " + respuesta.resultado;
            }
            leerJS();
        }
    }

    ajax.send(formData);
}

//BORRAR
function eliminarJS(id_usu) {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'DELETE');
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "eliminar/" + id_usu, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                document.getElementById('mensaje').innerHTML = "eliminado correctamente."
            } else {
                document.getElementById('mensaje').innerHTML = "Fallo eliminando " + respuesta.resultado;
            }
            leerJS();
        }
    }

    ajax.send(formData);
}
//EDITAR
function editarJS(id_usu) {
    /* Si hace falta obtenemos el elemento HTML donde introduciremos la recarga (datos o mensajes) */
    /* Usar el objeto FormData para guardar los parámetros que se enviarán:
       formData.append('clave', valor);
       valor = elemento/s que se pasarán como parámetros: token, method, inputs... */
    var formData = new FormData();
    formData.append('_token', document.getElementById('token').getAttribute("content"));
    formData.append('_method', 'DELETE');
    /* Inicializar un objeto AJAX */
    var ajax = objetoAjax();

    ajax.open("POST", "modificar/" + id_usu, true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            /* Leerá la respuesta que es devuelta por el controlador: */
            if (respuesta.resultado == 'OK') {
                document.getElementById('mensaje').innerHTML = "eliminado correctamente."
            } else {
                document.getElementById('mensaje').innerHTML = "Fallo eliminando " + respuesta.resultado;
            }
            leerJS();
        }
    }

    ajax.send(formData);
}

function settypeJS(id_tipo) {
    //Poner id como indefinido para k no filtre
    //Add class and remove class si tiene o no clase es el condicional
    if (id_tipo == document.getElementById('btn_tipo' + id_tipo)) {
        var boton = document.getElementsByClassName('transform');
        for (i = 0; i < boton.length; i++) {
            boton[i].style = 'transform: scale(1)';
        }
        id = undefined;
        leerJS();
    } else {
        var boton = document.getElementsByClassName('transform');
        for (i = 0; i < boton.length; i++) {
            boton[i].style = 'transform: scale(1)';
        }
        document.getElementById('btn_tipo' + id_tipo).style = 'transform: scale(1.12)';
        id = id_tipo;
        leerJS();
    }

}