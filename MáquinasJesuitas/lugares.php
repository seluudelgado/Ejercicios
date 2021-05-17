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
        $sql = "SELECT * FROM `lugares`";
        $objeto->realizarConsultas($sql);
        if($objeto->comprobarSelect()>0)
        {
            while($fila=$objeto->extraerFilas())
            {
                $nombre= $fila["Nombre"];
//              Paso por url a una página externa
                echo '<a href="contador.php?x='.$fila["Ip"].'">'.$nombre.'</a><br>';
            }
        }
    ?>
</body>
</html>

