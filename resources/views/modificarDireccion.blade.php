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
</head>
<body>
<form action="{{url('modificarDireccion')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre Dirección</p>
        <input type="text" name="direccion_resta" value="{{$Direccion->direccion_resta}}">
        <div>
            <input type="hidden" name="id" value="{{$Direccion->id}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>