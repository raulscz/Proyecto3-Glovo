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
        $id = $_REQUEST['id_seccion'];
      ?>
      <div class="cuadro_crear">
        <form action="{{url('crearPlato')}}" method="post" enctype="multipart/form-data">
          @csrf
          <h1>CREAR PLATOS</h1>
          <br>
          <div class="form-group">
            <p>Nombre Plato:</p>
            <div>
                <input class="inputcrear" type="text" name="nombre_plato" placeholder="Introduce el nombre..." value="{{old('nombre_plato')}}">
                @error('nombre_seccion')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <p>Descripción Plato:</p>
            <div>
                <input class="inputcrear" type="text" name="desc_plato" placeholder="Introduce la descripción..." value="{{old('desc_plato')}}">
                @error('desc_seccion')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <p>Precio Plato:</p>
            <div>
                <input class="inputcrear" type="number" name="precio_plato" step="0.1" placeholder="Introduce el precio..." value="{{old('precio_plato')}}">
                @error('precio_plato')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <p>Imagen:</p>
            <div>
                <input type="file" name="img_plato">
                @error('img_seccion')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <br><br>
          <div class="form-group">
            <input type="hidden" name="id_seccion" value="<?php echo $id ?>">
            <input class= "botoncrear" type="submit" value="Crear">
          </div>
        </form>
      </div>
    </div>
</body>
</html>