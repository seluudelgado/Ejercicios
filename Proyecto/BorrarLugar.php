<?php
    session_start();

    require_once('Clases/claseJesuitas.php');
    $objeto = new claseJesuitas();

    if(isset($_GET["borrar"]))
    {
        $objeto->borrarLugar($_GET["borrar"]);
        header("Location:BorrarLugar.php");
    }

?>
<html>
<head>
    <link rel="stylesheet" href="Css/disenio.css">
    <meta charset="UTF-8">
</head>
<body>
<main>
    <div class="borrar">
        <div>
            <h1>Borrar lugar</h1>
        </div>
        <div style="margin-left: 10%">
            <h2>Lugares:</h2>
            <?php
                $lugares=$objeto->consultaLugares();

                foreach ($lugares as $index => $item)
                {
                    echo "<div style='margin-bottom: 0.4rem;'>".$item." <a href='?borrar=".$index."'>Borrar</a></div>";
                }

            ?>
        </div>
        <div class="volver">
            <a href="indexAdmin.php" style="background-color: coral; float: none; margin: 1rem 0 0 10%;">Volver</a>
        </div>
    </div>
</main>
</body>
</html>