@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/')->send();
    ?>
@endif
<!DOCTYPE HTML>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Formulario Crear Restaurante</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="crear">
    <div class="row flex-cv">
      <?php
        $id = $_REQUEST['id_resta'];
      ?>
      <div class="cuadro_crear">
        <form action="{{url('crearDireccion')}}" method="post" enctype="multipart/form-data">
          @csrf
          <h1>CREAR DIRECCIÓN</h1>
          <br>
          <div class="form-group">
            <p>Nombre Dirección:</p>
            <div>
                <input class="inputcrear" type="text" name="direccion_resta" placeholder="Introduce la dirección..." value="{{old('direccion_resta')}}">
                @error('direccion_resta')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="id_resta" value="<?php echo $id ?>">
            <input class= "botoncrear" type="submit" value="Crear">
          </div>
        </form>
      </div>
    </div>
</body>
</html>