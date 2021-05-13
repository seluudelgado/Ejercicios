<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
if (!isset($_POST["enviar"])){
    echo '<form action="" METHOD="POST" id="hey">
        <label for ="correoUsuario">Introduce el correo</label></br>
        <input type="email" name="correo" placeholder="Correo del usuario" id="correoUsuario"/></br>
        <label for ="password">Introduce la contraseña</label></br>
        <input type="password" name="password" placeholder="Contraseña"/></br>
        <input type="submit" value="enviar" name="enviar"/>
        <a href="Registro.php"><input type="submit" value="registro" name="enviar"/></a> 
    </form>';
}
else
{
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
    }else{
        header("Location:iniciodesesion.php");
    }
}
?>
</body>
</html>
