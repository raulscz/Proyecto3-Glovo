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
    <title>Formulario Actualizar Restaurante</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="form">
    <div class="row flex-cv">
        <div class="cuadroForm">
            <form action="{{url('modificarRestaurante')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
                @csrf
                {{method_field('PUT')}}
                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Nombre Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_resta" id="" placeholder="Pancracio" value="{{$restaurante->nombre_resta}}">
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
                        <textarea class="formulario__input" id="" name="desc_resta" rows="4" cols="50">{{$restaurante->desc_resta}}</textarea>
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
                        <input type="time" class="formulario__input" id="" placeholder="12345678L" name="horario_ini_resta" value="{{$restaurante->horario_ini_resta}}">
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
                        <input type="time" class="formulario__input" id="" placeholder="Horario" name="horario_fi_resta" value="{{$restaurante->horario_fi_resta}}">
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
                        <input type="text" class="formulario__input" id="" placeholder="correo" name="correo_responsable" value="{{$restaurante->correo_responsable}}">
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
                            <option value="{{$restaurante->id_tipo}}">{{$restaurante->nombre_tipo}}</option>
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
                    <input type="hidden" name="id" value="{{$restaurante->id}}">
                    <button type="submit" value="Enviar" class="formulario__btn">Enviar</button>
                </div>
            </form>
        </div>
    </div>
	<script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>