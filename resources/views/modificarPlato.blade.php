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
    <title>Formulario Actualizar Plato</title>
</head>
<body>
<form action="{{url('modificarPlato')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre Plato</p>
        <input type="text" name="nombre_plato" value="{{$Plato->nombre_plato}}">
        <p>Descripción Plato</p>
        <input type="text" name="desc_plato" value="{{$Plato->desc_plato}}">
        <p>Precio Plato</p>
        <input type="number" step="0.1" name="precio_plato" value="{{$Plato->precio_plato}}">
        <p>Foto Plato</p>
        <input type="file" name="img_plato" value="{{$Plato->img_plato}}">
        <div>
            <input type="hidden" name="id" value="{{$Plato->id}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>