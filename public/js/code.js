window.onload = function() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

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

// function mostrarreg() {
//     document.getElementById('content_regis').innerHTML =
//         "<form action='/' method='POST'> @csrf" +
//         "<h1>Regístrate en Glovo</h1><br>" +
//         "<span><i class='fas fa-user'></i></span>" +
//         "<input class='inp_txt' type='text' name='correo_user' placeholder='Introduce tu nombre'><br><br>" +
//         "<span><i class='fas fa-envelope'></i></span>" +
//         "<input class='inp_txt' type='text' name='correo_user' placeholder='Introduce tu correo'><br><br>" +
//         "<span><i class='fas fa-lock'></i></span>" +
//         "<input type='password' name='pass_user' placeholder='Introduce tu contraseña'>" +
//         "<br><br>" +
//         "<button class='btn_regis' type='submit' value='register'>Resgistrarme</button><br><br>" +
//         "</form>" +
//         "<p>¿Ya tienes una cuenta? <button onclick='mostrarlog();' id='btn_regis'>Inicia sesión</button></p>"
// }

// function mostrarlog() {
//     document.getElementById('content_regis').innerHTML = "<button onclick='mostrarreg();' id='btn_regis'>Inicia sesión</button>";
// }

function mostrarlog() {
    window.location.href = "registrarUser";
}

function mostrarreg() {
    document.getElementById("content_regis").style.display = 'block';
    document.getElementById("content_regis2").style.display = 'none';
}

function modal_sec(id) {
    // Get the modal
    var modalid = document.getElementById("myModal" + id);

    // Get the button that opens the modal
    var btnid = document.getElementById("myBtn" + id);

    // Get the <span> element that closes the modal
    var spanid = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btnid.onclick = function() {
        modalid.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    spanid.onclick = function() {
        modalid.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalid) {
            modalid.style.display = "none";
        }
    }
}