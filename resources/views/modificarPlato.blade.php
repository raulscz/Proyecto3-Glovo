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
    <title>Formulario Actualizar Plato</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="form">
    <div class="row flex-cv">
        <div class="cuadroForm">
            <br>
            <h1>MODIFICAR PLATOS</h1>
            <br>
            <form action="{{url('modificarPlato')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
                @csrf
                {{method_field('PUT')}}
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Nombre Plato</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_plato" id="" placeholder="Pancracio" value="{{$Plato->nombre_plato}}">
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
                        <input type="text" class="formulario__input" name="desc_plato" id="" placeholder="Pancracio" value="{{$Plato->desc_plato}}">
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
                        <input type="number" class="formulario__input" name="precio_plato" id="" step="0.1" placeholder="5.99" value="{{$Plato->precio_plato}}">
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
                        <input type="file" class="formulario__input" name="img_plato" id="" value="{{$Plato->img_plato}}">
                        @error('img_plato')
                            <br>
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <br>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input type="hidden" name="id" value="{{$Plato->id}}">
                    <button type="submit" value="Enviar" class="formulario__btn">Enviar</button>
                </div>
            </form>
        </div>
    </div>
	<script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>