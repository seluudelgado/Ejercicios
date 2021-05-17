<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
require_once 'clasephp.php';
$objeto=new clasephp();
//INTRODUZCO UNA VISITAS NUEVA A LA TABLA VISITAS, RECOGIENDO EL DATO DE EL PASO DEL ENLACE
$sql="INSERT INTO `visitas`( `Ip`, `IdJesuita`, `FechaHora`) VALUES ('".$_GET["x"]."',1,now())";
$objeto->realizarConsultas($sql);
if ($objeto->comprobar()>0){
    echo 'Visita realizada';
}
else{
    echo' Debes recuperar la asignatura';
}
?>
</body>
</html>

