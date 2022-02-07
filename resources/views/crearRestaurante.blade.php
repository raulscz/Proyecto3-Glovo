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
      <div class="cuadro_crear">
        <form action="{{url('crearRestaurante')}}" method="post" enctype="multipart/form-data">
          @csrf
          <h1>CREAR RESTAURANTE</h1>
          <br>
          <div class="form-group">
            <p>Nombre:</p>
            <div>
                <input class="inputcrear" type="text" name="nombre_resta" placeholder="Introduce el nombre..." value="{{old('nombre_resta')}}">
                @error('nombre_resta')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <br>
          <div class="form-group">
            <p>Descripción:</p>
            <div>
                <input class="inputcrear" type="text" name="desc_resta" placeholder="Introduce la descripción..." value="{{old('desc_resta')}}">
                @error('desc_resta')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <br>
          <div class="form-group">
            <p>Horario Apertura:</p>
            <div>
                <input class="inputcrear" type="time" name="horario_ini_resta" placeholder="Introduce el horario..." value="{{old('horario_ini_resta')}}">
                @error('horario_ini_resta')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <p>Horario Cierre:</p>
            <div>
                <input class="inputcrear" type="time" name="horario_fi_resta" placeholder="Introduce el horario..." value="{{old('horario_fi_resta')}}">
                @error('horario_fi_resta')
                    <br>
                    {{$message}}
                @enderror
            </div>
          </div>
          <div class="form-group">
            <p>Imagen:</p>
            <div>
                <input type="file" name="img_resta">
            </div>
          </div>
          <div class="form-group">
            <p>Tipo:</p>
            <div>
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
          <br><br>
          <div class="form-group">
            <input class= "botoncrear" type="submit" value="Crear">
          </div>
        </form>
      </div>
    </div>
</body>
</html>