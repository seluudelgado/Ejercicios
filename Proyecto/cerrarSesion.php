<?php
session_start();
session_destroy(); //Destruye la sesión
header("location:InicioSesion.php"); //Redirecciona directamente a la página anterior
exit();
?>
