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
    /*Consulta que me ordena el numero de visitas a traves de la ip*/
    $sql="select v.Ip,l.Nombre, count(v.Ip) contador from visitas v INNER JOIN lugares l ON l.Ip=v.Ip group by v.Ip having contador  ORDER by contador desc";
    $objeto->realizarConsultas($sql);
    if ($objeto->comprobar()>0){
        while($fila=$objeto->extraerFilas())
        {
            $contador= $fila["contador"];
            $contador= $fila["Nombre"];
            echo $fila["Nombre"].' tiene un numero de visitas de  '.$fila["contador"].'<br>';
        }
    }
    else{
        echo' No hay visitas a ninguna web';
    }
?>

</body>
</html>
