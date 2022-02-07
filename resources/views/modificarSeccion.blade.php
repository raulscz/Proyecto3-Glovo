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
    <title>Formulario Actualizar Seccion</title>
</head>
<body>
<form action="{{url('modificarSeccion')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre Sección</p>
        <input type="text" name="nombre_seccion" value="{{$Seccion->nombre_seccion}}">
        <p>Foto Sección</p>
        <input type="file" name="img_seccion" value="{{$Seccion->img_seccion}}">
        <div>
            <input type="hidden" name="id" value="{{$Seccion->id}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>