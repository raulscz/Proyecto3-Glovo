<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Crear nuevo Usuario</title>
</head>
<body>
    <form action="{{url('registrarUser')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>Nombre Usuario</p>
        <input type="text" name="nombre_user" placeholder="Introduce el nombre..." value="{{old('nombre_user')}}">
        @error('nombre_user')
            <br>
            {{$message}}
        @enderror
        <p>Apellido Usuario</p>
        <input type="text" name="apellido_user" placeholder="Introduce el apellido..." value="{{old('apellido_user')}}">
        @error('apellido_user')
            <br>
            {{$message}}
        @enderror
        <p>DNI Usuario</p>
        <input type="text" name="dni_user" placeholder="Introduce el dni..." value="{{old('dni_user')}}">
        @error('dni_user')
            <br>
            {{$message}}
        @enderror
        <p>Edad Usuario</p>
        <input type="number" name="edad_user" placeholder="Introduce la edad..." value="{{old('edad_user')}}">
        @error('edad_user')
            <br>
            {{$message}}
        @enderror
        <p>Correo Usuario</p>
        <input type="text" name="correo_user" placeholder="Introduce el correo..." value="{{old('correo_user')}}">
        @error('correo_user')
            <br>
            {{$message}}
        @enderror
        <p>Contraseña Usuario</p>
        <input type="password" name="pass_user" placeholder="Introduce la contraseña..." value="{{old('pass_user')}}">
        @error('pass_user')
            <br>
            {{$message}}
        @enderror
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>