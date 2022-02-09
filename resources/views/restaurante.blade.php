<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pide a domicilio online con Glovo en Barcelona</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="shortcut icon" href="../../public/uploads/logo.png" type="image/x-icon">
    <script src="../js/iconos_g.js"></script>
    <link rel="shortcut icon" href="../../uploads/logo.png" type="image/x-icon">
    <script src="../js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <script src="../js/code.js"></script>
</head>
<body>
    <header>
        <form action="{{url('')}}" method="get">
            <button class="btn_frm"><img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/logo_green.svg" width="130" height="44"></button>
        </form>    
      <input class="inp_txt2" type="text" id="leerajaxhtml" placeholder="🔎 Buscar" onkeyup="leerJS()">
      <button class="empezar" id="myBtn"><b>Empezar</b></button> 
    </header>
    <div class="rest">
      <div class="restaurante">
          @foreach ($datos as $item)
                <div><h2>{{$item->nombre_resta}}</h2></div>
                <div class="d_flex">
                  <div class="mitad"><img class="img_resta" src="{{asset('storage').'/'.$item->img_resta}}"></div>
                  <div class="mitad">
                    @foreach ($sec as $item2)
                        <div class="mitad_mitad">
                          <button class="btn_frm2" {{-- id="myBtn{{$item2->id}}" --}} onclick="seccionJS(/* {{$item2->id}}, */{{$item->id}},{{$item2->id}}); modal_sec(/* {{$item2->id}} */);"><h3>{{$item2->nombre_seccion}}</h3></button>
                        </div>
                    @endforeach
                  </div>
                </div>
          @endforeach
      </div>
    </div>

    <!--Modal-->
    <div id="myModal" class="modal">

      <div class="modal-content">
        <span class="close">&times;</span>
          <div class="register" id="content_regis">
            <form action="{{url('')}}" method="POST">
              @csrf
                <h1>Regístrate en Glovo</h1><br>
                <span><i class="fas fa-user"></i></span>
                <input class="inp_txt" type="text" name="correo_user" placeholder="Introduce tu nombre"><br><br>
                <span><i class="fas fa-envelope"></i></span>
                <input class="inp_txt" type="text" name="correo_user" placeholder="Introduce tu correo"><br><br>
                <span><i class="fas fa-lock"></i></span>
                <input type="password" name="pass_user" placeholder="Introduce tu contraseña">
                <br><br>
                <button class="btn_regis" type="submit" value="register">Registrarme</button><br><br>
              </form>
              <p>¿Ya tienes una cuenta? <button class="btn_mostrar" onclick="mostrarlog();" id="btn_regis">Inicia sesión</button></p>
          </div>
          <div class="register2" id="content_regis2">
            <form action="{{url('')}}" method="POST">
              @csrf
                <h1>Iniciar sesion en Glovo</h1><br>
                <span><i class="fas fa-envelope"></i></span>
                <input class="inp_txt" type="text" name="correo_user" placeholder="Introduce tu correo"><br><br>
                <span><i class="fas fa-lock"></i></span>
                <input type="password" name="pass_user" placeholder="Introduce tu contraseña">
                <br><br>
                <button class="btn_regis" type="submit" value="register">Iniciar Sesión</button><br><br>
              </form>
              <p>¿No tienes una cuenta todavía? <button class="btn_mostrar" onclick="mostrarreg();" id="btn_regis">Registrarme</button></p>
          </div>
      </div>
    </div>

    {{-- Otro Modal --}}
    <div id="myModal2" class="modal2">

      <div class="modal-content2">
        <span class="close">&times;</span>
        <div class="cont_sec" id="cont_sec">
          
        </div>
      </div>
    </div>

    <footer>
      <div class="footer-basic">
        <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/glovo-white.svg">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Inicio</a></li>
                <li class="list-inline-item"><a href="#">Acerca</a></li>
                <li class="list-inline-item"><a href="#">Términos</a></li>
                <li class="list-inline-item"><a href="#">Politicas de Privacidad</a></li>
            </ul>
            <p class="copyright">David Ortega Raúl Santacruz Daniel Ruano© 2022</p>
          </div>
    </footer>
</body>
</html>