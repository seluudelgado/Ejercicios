<?php
session_start();

require_once('Clases/claseJesuitas.php');
$objeto=new claseJesuitas();

if(isset($_SESSION["ipUsuario"]))
{
    header('location: SeleccionLugar.php ');
    //Te mantiene la sesión iniciada y te redirige directamente a la página de selección del lugar
}

if(isset($_POST["inicioAdmin"]) && $_POST["password"]!="" && $_POST["IP"]!="")
{
    if($objeto->comprobarLogin($_POST["IP"], $_POST["password"], true))
    {
        header("location: indexAdmin.php");
    }
}

if(!$objeto->existeAdmin())
{
    //Esto no debería salir nunca, es para saber si estamos intentando acceder a la página cuando no hay admin
    echo '<h1>no hay ningún administrador registrado en la base de datos</h1>';
}

?>
<!--Esta es la página de inicio de sesión del usuario la cual tiene un enlace para poder registrarte-->
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Css/disenio.css">
</head>
<body>
<main>
    <div class="inicioSesion">
        <div>
            <h1>Administrador</h1>
        </div>
        <div>
            <form method="post" action="#">
                <div>
                    <h4 for="IP">IP</h4>
                    <!--Con los php if indico condiciones para comprobar uno a uno los campos y que todos los procesos se cumplen.-->
                    <input type="text" name="IP" value="<?php if(isset($_POST["inicioAdmin"]) && $_POST["IP"]!="") echo $_POST["IP"];?>">
                </div>
                <?php if(isset($_POST["inicioAdmin"]) && $_POST["IP"]==""):?>
                    <div style="color: red">No se ha rellenado este campo</div>
                <?php endif;?>
                <div>
                    <h4 for="password">Contraseña</h4>
                    <input type="password" name="password">
                </div>
                <?php if(isset($_POST["inicioAdmin"]) && $_POST["password"]==""):?>
                <div style="color: red">Rellena la contraseña</div>
                <?php endif;?>
                <div class="submit">
                    <input type="submit" name="inicioAdmin" value="Entrar">
                </div>
            </form>
            <?php if(isset($_POST["inicioAdmin"]) && $_POST["password"]!="" && $_POST["IP"]!=""):?>
            <div style="color: red">Ip o contraseña incorrectas</div>
            <?php endif;?>
        </div>
    </div>
</main>
</body>
</html>