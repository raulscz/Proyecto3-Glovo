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
</head>
<body>
    <div class="row flex-cv">
        <div>
            <form action="{{url('logout')}}" method="GET">
                <div class="form-group">
                    <button type="submit" name="logout" value="logout">Logout</button>
                </div>
            </form>
        </div>
        <div class="btn-group" role="group">
            <form action="{{url('mostrarUsuarios')}}" method="GET">
                <div class="form-group">
                    <p>Gestión de Usuarios</p>
                    <button type="submit" value="Enviar">Usuarios</button>
                </div>
            </form>
            <form action="{{url('mostrarRestaurantes')}}" method="GET">
                <div class="form-group">
                    <p>Gestión de Usuarios</p>
                    <button type="submit" value="Enviar">Restaurantes</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>