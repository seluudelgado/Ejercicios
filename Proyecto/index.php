<?php //session_start()?>
<!--Jose Luis Delgado-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plantilla</title>
    <link rel="stylesheet" href="Css/disenio.css">
</head>
<body>
    <main><!--Este es el index que conecta con el inicio de sesión del usuario como página principal, el registro se hace a través del login con un enlace, y el inicio de sesión de administrador va
        por url externa-->
        <?php
        if(!isset($_GET["pag"]) and !isset($_SESSION['Ip']))
        {
            require_once ('InicioSesion.php'); //Página principal
        }else{
            switch ($_GET["pag"])
            {
                case 'admin':
                    require_once ('InicioAdmin.php');//Página acceso por URL
                    break;
                case 1:
                    require_once ('RegistroUsuarios.php');//Acceso por URL o a través del inicio de sesión
                    break;
                case 2:
                    require_once ('seleccionlugar.php');
            }
        }

        ?>
    </main>
</body>
</html>