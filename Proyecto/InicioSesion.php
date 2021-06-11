<?php
session_start();

if(isset($_SESSION["ipUsuario"]))
{
    header('location: SeleccionLugar.php '); //Te mantiene la sesión iniciada y te redirige directamente a la página de selección del lugar
}

require_once('Clases/claseJesuitas.php');
$objeto=new claseJesuitas();
$resultado = false;
if(isset($_POST["inicio"]) && (!empty($_POST["IP"])) && (!empty($_POST["password"])))
{
    $ip= $_POST["IP"];
    $password= $_POST["password"];
    $resultado=$objeto->comprobarLogin($ip,$password,false); //Utilizo el método para comprobar que la contraseña se pasa encriptada

    if($resultado)
    {
        if($data = $objeto->datosUsuario($ip))
        {

            $_SESSION['idLugar'] = $data['IdLugar'];
            $_SESSION["ipUsuario"]=$data['Ip'];
            $_SESSION["idUsuario"]=$data['IdJesuita'];

            header('Location: SeleccionLugar.php'); //Comprueba que si la IP y la contraseña son correctas, te redireccione a la selección del lugar
        }

    }
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
            <h1>Iniciar sesión</h1>
        </div>
        <div>
            <form method="post" action="#">
                <div>
                    <h4 for="IP">IP</h4>
                    <!--Con los php if indico condiciones para comprobar uno a uno los campos y que todos los procesos se cumplen.-->
                    <input type="text" name="IP" value="<?php if(isset($_POST["inicio"])) echo $_POST["IP"];?>">
                </div>
                <?php if(isset($_POST["inicio"]) && $_POST["IP"]==''):?>
                    <div style="color: red">No se ha rellenado este campo</div>
                <?php endif;?>
                <div>
                    <h4 for="password">Contraseña</h4>
                    <input type="password" name="password">
                </div>
                <?php if(isset($_POST["inicio"]) && $_POST["password"]==''):?>
                    <div style="color: red">Rellena la contraseña</div>
                <?php endif;?>
                <div class="submit">
                    <input type="submit" name="inicio" value="Entrar">
                    ¿No tienes cuenta? <a href="RegistroUsuarios.php">Regístrate!!</a>
                </div>
            </form>
            <?php if(isset($_POST["inicio"]) && !$resultado):?>
                <div style="color: red">Ip o contraseña incorrectas</div>
            <?php endif; ?>
        </div>
    </div>
</main>
</body>
</html>