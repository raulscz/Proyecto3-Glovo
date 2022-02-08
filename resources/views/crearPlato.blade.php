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
  <title>Formulario Crear Plato</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="form">
    <div class="row flex-cv">
      <?php
        $id = $_REQUEST['id_seccion'];
      ?>
      <div class="cuadroForm">
        <br>
        <h1>CREAR PLATOS</h1>
        <br>
        <form action="{{url('crearPlato')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
          @csrf
          <!-- Grupo: Nombre -->
          <div class="formulario__grupo" id="">
            <label class="formulario__label">Nombre Plato</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="nombre_plato" id="" placeholder="Pancracio" value="{{old('nombre_plato')}}">
              @error('nombre_plato')
                <br>
                {{$message}}
              @enderror
            </div>
          </div>
          <!-- Grupo: Descripción -->
          <div class="formulario__grupo" id="">
            <label class="formulario__label">Descripción Plato</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="desc_plato" id="" placeholder="Pancracio" value="{{old('desc_plato')}}">
              @error('desc_plato')
                <br>
                {{$message}}
              @enderror
            </div>
          </div>
          <!-- Grupo: Precio -->
          <div class="formulario__grupo" id="">
            <label class="formulario__label">Precio Plato</label>
            <div class="formulario__grupo-input">
              <input type="number" class="formulario__input" name="desc_plato" id="" step="0.1" placeholder="5.99" value="{{old('precio_plato')}}">
              @error('precio_plato')
                <br>
                {{$message}}
              @enderror
            </div>
          </div>
          <!-- Grupo: Imagen -->
          <div class="formulario__grupo" id="">
            <label class="formulario__label">Imagen Plato</label>
            <div class="formulario__grupo-input">
              <input type="file" class="formulario__input" name="img_plato" id="" value="{{old('img_plato')}}">
              @error('img_plato')
                <br>
                {{$message}}
              @enderror
            </div>
          </div>
          <br>
          <div class="formulario__grupo formulario__grupo-btn-enviar">
            <input type="hidden" name="id_seccion" value="<?php echo $id ?>">
            <button type="submit" value="Enviar" class="formulario__btn">Enviar</button>
          </div>
        </form>
      </div>
    </div>
	<script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>