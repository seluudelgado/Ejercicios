<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Comprobacion de Usuarios</title>
</head>
<body>
<?php
session_start();
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
$consulta=
    "
        SELECT *
        FROM usuarios
        WHERE correo='".$_POST["correo"]."' && pass='".$_POST["password"]."';
    ";
/*Comprueba la consulta y la hace en la base de datos*/
$objconexion->realizarConsultas($consulta);
if($objconexion->comprobarSelect()>0) /*Devuelve 1 si encuentra filas afectadas en la base de datos*/
{
    $fila=$objconexion->extraerFilas();
    $_SESSION["usuario"]=$fila["nombre"];
    header("Location:index.php");
}
else
    /*Comprobacion de  Inicio de Sesion, si el usuario y la contraseña se obtienen de la BBDD*/
    {
    echo 'Contraseña mal introducida o Usuario Inexistente</br>';
}
if(!isset($_POST["registro"])){
    echo
    '
    <form action="" METHOD="POST">
        <label for ="nombre">Introduce el nombre </label></br>
       <input type="text" name="nombre" placeholder="Introduce el usuario" required /></br>
       <label for ="email">Introduce el correo </label></br>
       <input type="text" name="correo" placeholder="Introduce el correo" required /></br>
       <label for ="password">Introduce la contraseña</label></br>
       <input type="password" name="password" placeholder="Contraseña" required/></br>
        <label for ="password2">Repite tu contraseña</label></br>
        <input type="password" name="password2" placeholder="Contraseña" required/></br>
        <input type="submit" value="Enviar" name="registro"/>
       <input type="submit" value="cancelar" name="cancelar"/>
       </form>
';
}
else
{
    if($_POST["password"]== $_POST["password2"] and
        (!empty($_POST["nombre"] and $_POST["password"] and $_POST["password2"] and $_POST["correo"])))
    {   /*Comprueba que debe de introducir todos los campos*/

        $consulta =
            "
            INSERT INTO usuarios (nombre,correo,pass)
            VALUES ('" . $_POST["nombre"] . "','" . $_POST["correo"] . "','" . $_POST["password"] . "')
        ";
        $objconexion->realizarConsultas($consulta);
        /*Comprueba el id de la consulta anterior*/
        if($objconexion->comprobar()>0)
        {
            /*Realiza la consulta cuando se deja el campo de correo personal en Vacio*/
            header("Location:index.php");
        }
        else
        {
            echo 'Usuario no registrado </br>';
        }
    }
    else
    {
        echo 'Rellene todos los campos o las contraseñas no coinciden<br>';

    }

}


?>
</body>
</html>