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
    <title>Formulario Crear Usuario</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="form">
    <br>
    <div class="row flex-cv">
        <div class="cuadroForm">
            <form action="{{url('crearUser')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
                @csrf
                <!-- Grupo: Usuario -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Nombre Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_user" id="" placeholder="Pancracio" value="{{old('nombre_user')}}">
                        @error('nombre_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: apellido -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Apellido</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="apellido_user" id="" placeholder="Pérez" value="{{old('apellido_user')}}">
                        @error('apellido_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: DNI -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">DNI</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="dni_user" id="" placeholder="12345678L" value="{{old('dni_user')}}">
                        @error('dni_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: EDAD -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Edad</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" name="edad_user" id="" placeholder="edad" value="{{old('edad_user')}}">
                        @error('edad_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Correo Electrónico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" class="formulario__input" name="correo_user" placeholder="correo@correo.com" value="{{old('correo_user')}}">
                        @error('correo_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" name="pass_user" placeholder="Contraseña" value="{{old('pass_user')}}">
                        @error('pass_user')
                        <br>
                        {{$message}}
                        @enderror
                    </div>
                </div>

                <!-- Grupo: Tipo -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Tipo</label>
                    <div class="formulario__grupo-input">
                        <select name="nombre_rol">
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                        @error('nombre_rol')
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