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
<body class="form">
    <div class="row flex-cv">
      <div class="cuadroForm">
        <h1>Crear Restaurante</h1>
        <br>
        <form action="{{url('crearRestaurante')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
          @csrf
          <!-- Grupo: Nombre -->
          <div class="formulario__grupo" id="">
                    <label class="formulario__label">Nombre Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_resta" id="" placeholder="Pancracio" value="{{old('nombre_resta')}}">
                        @error('nombre_resta')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Descripción -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Descripción</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" id="" placeholder="Pérez" name="desc_resta" value="{{old('desc_resta')}}">
                        @error('desc_resta')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Horario -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Horario Apertura</label>
                    <div class="formulario__grupo-input">
                        <input type="time" class="formulario__input" id="" placeholder="12345678L" name="horario_ini_resta" value="{{old('horario_ini_resta')}}">
                        @error('horario_ini_resta')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Horario 2 -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Horario Cierre</label>
                    <div class="formulario__grupo-input">
                        <input type="time" class="formulario__input" id="" placeholder="edad" name="horario_fi_resta" value="{{old('horario_fi_resta')}}">
                        @error('horario_fi_resta')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Imagen -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Imagen</label>
                    <div class="formulario__grupo-input">
                        <input type="file" class="formulario__input" name="img_resta">
                        @error('img_resta')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Correo -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Correo Responsable</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" id="" placeholder="correo" name="correo_responsable" value="{{old('correo_responsable')}}">
                        @error('correo_responsable')
                          <br>
                          {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Tipo -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Tipo</label>
                    <div class="formulario__grupo-input">
                        <select name="id_tipo">
                          @foreach($listaTipo as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
                          @endforeach
                        </select>
                        @error('id_tipo')
                            <br>
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" value="Enviar" class="formulario__btn">Enviar</button>
                </div>
            </form>
        </div>
    </div>
	<script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>