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
    <title>Formulario Actualizar Usuario</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="form">
    <div class="row flex-cv">
        <div class="cuadroForm">
            <form action="{{url('modificarUsuario')}}" method="post" enctype="multipart/form-data" class="formulario" id="formulario">
                @csrf
                {{method_field('PUT')}}
                <!-- Grupo: Usuario -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Nombre Usuario</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre_user" id="" placeholder="Pancracio" value="{{$Usuario->nombre_user}}">
                    </div>
                </div>

                <!-- Grupo: apellido -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Apellido</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="apellido_user" id="" placeholder="Pérez" value="{{$Usuario->apellido_user}}">
                    </div>
                </div>

                <!-- Grupo: DNI -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">DNI</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="dni_user" id="" placeholder="12345678L" value="{{$Usuario->dni_user}}">
                    </div>
                </div>

                <!-- Grupo: EDAD -->
                <div class="formulario__grupo" id="">
                    <label class="formulario__label">Edad</label>
                    <div class="formulario__grupo-input">
                        <input type="number" class="formulario__input" name="edad_user" id="" placeholder="edad" value="{{$Usuario->edad_user}}">
                    </div>
                </div>

                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Correo Electrónico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" class="formulario__input" name="correo_user" placeholder="correo@correo.com" value="{{$Usuario->correo_user}}">
                    </div>
                </div>

                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" name="pass_user" placeholder="Contraseña" value="{{$Usuario->pass_user}}">
                    </div>
                </div>

                <!-- Grupo: Tipo -->
                <div class="formulario__grupo">
                    <label class="formulario__label">Tipo</label>
                    <div class="formulario__grupo-input">
                        <select name="nombre_rol">
                            <option value="{{$Usuario->nombre_rol}}">{{$Usuario->nombre_rol}}</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                    </div>
                </div>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input type="hidden" name="id" value="{{$Usuario->id}}">
                    <input type="hidden" name="id_rol" value="{{$Usuario->id_rol}}">
                    <button type="submit" value="Enviar" class="formulario__btn">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>