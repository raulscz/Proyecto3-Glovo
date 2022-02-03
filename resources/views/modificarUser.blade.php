<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actualizar Usuario</title>
</head>
<body>
<form action="{{url('modificarUsuario')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <p>Nombre Usuario</p>
        <input type="text" name="nombre_user" value="{{$Usuario->nombre_user}}">
        <p>Apellido Usuario</p>
        <input type="text" name="apellido_user" value="{{$Usuario->apellido_user}}">
        <p>DNI Usuario</p>
        <input type="text" name="dni_user" value="{{$Usuario->dni_user}}">
        <p>Edad Usuario</p>
        <input type="number" name="edad_user" value="{{$Usuario->edad_user}}">
        <p>Correo Usuario</p>
        <input type="text" name="correo_user" value="{{$Usuario->correo_user}}">
        <p>Tipo Usuario</p>
        <select name="nombre_rol">
            <option value="{{$Usuario->nombre_rol}}">{{$Usuario->nombre_rol}}</option>
            <option value="Administrador">Administrador</option>
            <option value="Usuario">Usuario</option>
        </select>
        <div>
            <input type="hidden" name="id" value="{{$Usuario->id}}">
            <input type="hidden" name="id_rol" value="{{$Usuario->id_rol}}">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>