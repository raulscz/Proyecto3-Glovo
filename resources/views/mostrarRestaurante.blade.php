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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mostrar Restaurantes</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="mostrar">
    <div>
        <form action="{{url('crearRestaurante')}}" method="GET">
            <button class= "btn" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('cPanelAdmin')}}" method="GET">
            <button id="vista" class= "btn" type="submit" name="Crear" value="Crear">Vista</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "btn" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div class="row flex-cv">
        <table class="table" id="table">
            <tr class="active">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>HORARIO</th>
                <th>RESPONSABLE</th>
                <th>TIPO</th>
                <th>FOTO</th>
                <th colspan="4">ACCIONES</th>
            </tr>
            @foreach($listaRestaurantes as $restaurante)
                <tr>
                    <td>{{$restaurante->id}}</td>
                    <td>{{$restaurante->nombre_resta}}</td>
                    <td>{{$restaurante->desc_resta}}</td>
                    <td>{{$restaurante->horario_ini_resta}}-{{$restaurante->horario_fi_resta}}</td>
                    <td>{{$restaurante->correo_responsable}}</td>
                    <td>{{$restaurante->nombre_tipo}}</td>
                    <td style="padding: auto; text-align: center"><img src="{{asset('storage').'/'.$restaurante->img_resta}}" width="100"></td>
                    <td><form  action="{{url('eliminarRestaurante/'.$restaurante->id)}}" method="POST">
                        @csrf
                        <!--{{csrf_field()}}--->
                        {{method_field('DELETE')}}
                        <!--@method('DELETE')--->
                        <button class= "botonTabla" type="submit" name="Eliminar" value="Eliminar" id="btnEli">Eliminar</button>
                    </form></td>
                    <td><form action="{{url('modificarRestaurante/'.$restaurante->id)}}" method="GET">
                        <button class= "botonTabla" type="submit" name="Modificar" value="Modificar">Modificar</button>
                    </form></td>
                    <td><form  action="{{url('mostrarDirecciones/'.$restaurante->id)}}" method="GET">
                        <input type="hidden" name="id_resta" value="{{$restaurante->id}}">
                        <button class= "botonTabla" type="submit" value="Direcciones" id="btnDir">Direcciones</button>
                    </form></td>
                    <td><form  action="{{url('mostrarSecciones/'.$restaurante->id)}}" method="GET">
                        <input type="hidden" name="id_resta" value="{{$restaurante->id}}">
                        <button class= "botonTabla" type="submit" value="Secciones" id="btnSec">Secciones</button>
                    </form></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>