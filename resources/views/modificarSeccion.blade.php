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
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="cPanel">
    <div class="row flex-cv">
        <div class="cuadro">
            <form action="{{url('modificarSeccion')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <h1>MODIFICAR SECCION</h1>
                <br>
                    <div class="form-group">
                        <p>Nombre SECCION:</p>
                        <div>
                        <input type="text"  class="botoncPanel" name="nombre_seccion" value="{{$Seccion->nombre_seccion}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Imagen:</p>
                        <div>
                            <input type="file" name="img_seccion" value="{{$Seccion->img_seccion}}">
                        </div>
                    </div>
                <div>
                    <input type="hidden" name="id" value="{{$Seccion->id}}">
                    <input  class="botoncPanel" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>