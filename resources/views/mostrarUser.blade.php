<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mostrar Usuarios</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="mostrar">
    <div>
        <form action="{{url('crearUser')}}" method="GET">
            <button class= "btn" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('vista')}}" method="GET">
            <button id="vista" class= "btn" type="submit" name="Crear" value="Crear">Vista</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "btn" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div class="row flex-cv">
        <table class="table">
            <tr class="active">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DNI</th>
                <th>EDAD</th>
                <th>EMAIL</th>
                <th>TIPO USUARIO</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
            </tr>
            @foreach($listaUsuarios as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->nombre_user}}</td>
                    <td>{{$user->apellido_user}}</td>
                    <td>{{$user->dni_user}}</td>
                    <td>{{$user->edad_user}}</td>
                    <td>{{$user->correo_user}}</td>
                    <td>{{$user->nombre_rol}}</td>
                    <td><form action="{{url('eliminarUsuario/'.$user->id)}}" method="POST">
                        @csrf
                        <!--{{csrf_field()}}--->
                        {{method_field('DELETE')}}
                        <!--@method('DELETE')--->
                        <button class= "botonTabla" type="submit" name="Eliminar" value="Eliminar" id="btnEli">Eliminar</button>
                    </form></td>
                    <td><form action="{{url('modificarUsuario/'.$user->id)}}" method="GET">
                        <button class= "botonTabla" type="submit" name="Modificar" value="Modificar">Modificar</button>
                    </form></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>