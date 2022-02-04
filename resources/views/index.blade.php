<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pide a domicilio online con Glovo en Barcelona</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../uploads/logo.png" type="image/x-icon">
</head>
<body>
    <header>
      <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/logo_green.svg" width="130" height="44">
      <form action="" onsubmit="">
        <input type="text" placeholder="Buscar">
      </form>
        <button class="empezar"><b>Empezar</b></button>
    </header>
      <div class="tipo_rest">
        @foreach ($tipo as $item)
            <div>
                <button class="tipos"><img class="img_bt" src="../uploads/{{$item->img_tipo}}"><br>{{$item->nombre_tipo}}</button>
            </div>
        @endforeach
    </div>
    <div class="rest">
      @foreach ($restaurantes as $item)
            <div>
                <h3>{{$item->nombre_resta}}</h3>
            </div>
        @endforeach
    </div>
</body>
</html>