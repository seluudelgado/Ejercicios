<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Cerrar sesion</title>
</head>
<body>
<?php
/*Sirve para cerrar Sesión , siempre debe de tener un SessionStar antes de cerrarla*/
session_start();
if (session_destroy()) {
    echo "Has cerrado sesión";
    header("Location:index.php");
}
echo '</br></br><a href="InicioSesion.php"> Volver al inicio de sesion </a>';
?>
</body>
</html>