<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pide a domicilio online con Glovo en Barcelona</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/uploads/logo.png" type="image/x-icon">
    <script src="js/iconos_g.js"></script>
    <script src="js/code.js"></script>
</head>
<body>
    <header>
      <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/logo_green.svg" width="130" height="44">
      <form action="" onsubmit="">
          <input class="inp_txt" type="text" placeholder="🔎 Buscar">
      </form>
        <button class="empezar" id="myBtn"><b>Empezar</b></button>
    </header>
    <div class="yellow">
      <div class="tipo_rest">
        @foreach ($tipo as $item)
            <div>
              <form action="{{url('tipo_rest')}}" method="GET">
                <button class="tipos"><img class="img_bt" src="../public/uploads/{{$item->img_tipo}}"><br>{{$item->nombre_tipo}}</button>
              </form>
            </div>
        @endforeach
    </div>
    <br><br>
    </div>
    <div class="rest">
      <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/curve--small.svg" class="landing-highlights-container__curve" >
      <br><br><br><br>  
      <span class="ttl_rest">
        Restaurantes
      </span>
      <div class="res">
          @foreach ($restaurantes as $item)
            <div class="cont_res">
              <div class="tam_res">
                <img src="../public/uploads/{{$item->img_resta}}">
              </div>
                <div class="bar_res">
                  <span><b>{{$item->nombre_resta}}</b></span>
                </div>
            </div>
          @endforeach
        </div>
    </div>
    <div class="img_color">
      <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/curve--small.svg" class="landing-highlights-container__curve" >
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
                <button class="btn_regis" type="submit" value="register">Resgistrarme</button><br><br>
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
    <footer>
      
    </footer>
</body>
</html>