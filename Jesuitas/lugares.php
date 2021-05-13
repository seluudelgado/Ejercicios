<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lugares</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="general">
    <img src="imagenes/logotipo.png">
    <h1>Lugares visitados por los jesuitas</h1><br/>
        <?php
            require_once 'clasephp.php';
            $objeto=new clasephp();
            $sql = "SELECT * FROM Lugares";
            $objeto->realizarConsultas($sql);
            if($objeto->comprobarSelect()>0) {
                    while ($fila = $objeto->extraerFilas()) {
                        $nombre = $fila["Nombre"];
                        //              Paso por url a una página externa

                        echo '<a href="contador.php?x=' . $fila["Ip"] . '">' . $nombre . '</a> ';
                    }
            }
        ?>
    </div>
</body>
</html>

