@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actualizar Dirección</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="cPanel">
    <div class="row flex-cv">
        <div class="cuadro">
            <form action="{{url('modificarDireccion')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <h1>Modificar Dirección</h1>
                <br>
                <div class="form-group">
                    <p>Nombre Dirección:</p>
                    <div>
                    <input  class="botoncPanel" type="text" name="direccion_resta" value="{{$Direccion->direccion_resta}}">
                    </div>
                </div>
                <br>
                <div>
                    <input type="hidden" name="id" value="{{$Direccion->id}}">
                    <input class="botoncPanel" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>