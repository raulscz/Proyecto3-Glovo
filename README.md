# PROYECTO 3 - GLOVO

**Este proyecto trata sobre replicar la página web de GLOVO con los requisitos que nos marcan en el proyecto, ya sea hacer CRUD's o filtros con AJAX.**

## Comenzando 🚀

Si quieres obtener mi proyecto sigue estos pasos:

1. Copiar el enlace de code en verde para seguidamente hacer un git clone en Visual Studio Code.
2. Una vez clonado dentro de htdocs ejecutamos en el terminal *composer install*
3. Luego el env.example lo renombramos a .env 
4. Seguidamente ejecutamos en el terminal *php artisan key:generate*
5. Dentro del .env donde pone **DB_DATABASE** ponemos el nombre de la base de datos.
6. Insertar la base de datos al phpmyadmin con las credenciales correctas en tu caso.


## Pre-requisitos 📋

### EDITOR DE CÓDIGO-> VISUAL STUDIO CODE
### INSTALAR XAMPP: https://www.apachefriends.org/es/index.html

### Acceso login

Hosting -> https://proyecto2davidortega.000webhostapp.com/view/login.php

```
USUARIO  |  CONTRASEÑA
-----------------------
David    |  qweQWE123   
Profesor |  qweQWE123
Cambrer  |  asdASD123

David y Profesor son admins, mientras que Cambrer solo puede hacer reservas y mirarlas.
```

## Instalación 🔧
```
-Meter los archivos previamente descargados en c:\xampp\htdocs\www\proyecto2.
-Tener activados los servicios Apache y MySQL en XAMPP.

NOTA: Este proyecto está pensado para usarse con phpmyadmin.
```
### Crear carpeta dentro de services donde está config.php y poner lo siguiente
```
<?php
require_once '../services/config.php';
$servidor= "mysql:host=".SERVIDOR."; dbname=".BD; 
try{
    $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
}catch(PDOException $e){
    echo $e->getMessage();
    echo "<script> alert('Error de conexion')</script>";
}

$host = "localhost";
$usr = "root";
$pwd = "";
$db = "bd_restaurant";

$connection = new mysqli("$host", "$usr", "$pwd",$db);
?>
```

## Despliegue 📦

Para desplegar el proyecto deberemos seleccionar un hosting gratuito, ya sea 000webhost o infinityfree por ejemplo. En mi caso utilizaré 000webhost.
¡En internet hay miles de tutoriales que nos enseñan a desplegar nuestro proyecto!
## Construido con 🛠️

    PHP 
    JAVASCRIPT
    MYSQL
    CSS

## Autor ✒️

    David Ortega Colomo   -   Estudiante DAW2

## Agradecimientos 🍺

    Gracias a los profesores por ayudarme a desarrollar mi tarea cuando estaba colapsado y gracias a mis compañeros por echarme una ayudita

    Si te ha quedado alguna duda sobre el proyecto no dudes en contactarme por correo -> 100006394.joan23@fje.edu
