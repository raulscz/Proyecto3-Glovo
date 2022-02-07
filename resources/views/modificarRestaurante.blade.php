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
    <title>Formulario Actualizar Restaurante</title>
</head>
<body>
<form action="{{url('modificarRestaurante')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre Restaurante</p>
        <input type="text" name="nombre_resta" value="{{$restaurante->nombre_resta}}">
        <p>Descripción Resturante</p>
        <textarea name="desc_resta" rows="4" cols="50">{{$restaurante->desc_resta}}</textarea>
        <p>Horario Apertura</p>
        <input type="time" name="horario_ini_resta" value="{{$restaurante->horario_ini_resta}}">
        <p>Horario Cierre</p>
        <input type="time" name="horario_fi_resta" value="{{$restaurante->horario_fi_resta}}">
        <p>Foto Restaurante</p>
        <input type="file" name="img_resta" value="{{$restaurante->img_resta}}">
        <p>Tipo Restaurante</p>
        <select name="id_tipo">
            <option value="{{$restaurante->id_tipo}}">{{$restaurante->nombre_tipo}}</option>
            @foreach($listaTipo as $tipo)
                <option value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
            @endforeach
        </select>
        <div>
            <input type="hidden" name="id" value="{{$restaurante->id}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>