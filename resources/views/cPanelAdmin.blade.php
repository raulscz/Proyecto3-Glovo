@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel Administrador</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <script src="js/iconos_g.js"></script>
</head>
<body class="cPanel">
    <br><br><br><br><br>
    <div class="row flex-cv">
        <div class="cuadro">
            <h1>Control Admin Panel</h1>
            <div>
                <form action="{{url('logout')}}" method="GET">
                    <div class="form-group">
                        <span><i class="fas fa-sign-out-alt"></i></span>
                        <button type="submit" value="logout" class="botoncPanel">LOGOUT</button><br><br>
                    </div>
                </form>
            </div>
            <div class="btn-group" role="group">
                <form action="{{url('mostrarUsuarios')}}" method="GET">
                    <div class="form-group">
                        <span><i class="fas fa-user"></i></span>
                        <button type="submit" value="Enviar" class="botoncPanel">USUARIOS</button><br><br>
                    </div>
                </form>
                <form action="{{url('mostrarRestaurantes')}}" method="GET">
                    <div class="form-group">
                        <span><i class="fas fa-utensils"></i></span>
                        <button type="submit" value="Enviar" class="botoncPanel">RESTAURANTES</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>