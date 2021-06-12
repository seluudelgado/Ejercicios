<?php
    session_start();

    require_once('Clases/claseJesuitas.php');
    $objeto = new claseJesuitas();

    if(isset($_POST["envio"]))
    {


        if(!empty($_POST["texto"]))
        {
            $anadir = $_POST["texto"];

            $correcto=$objeto->anadirLugar($anadir);
        }
    }
?>
<html>
<head>
    <link rel="stylesheet" href="Css/disenio.css">
    <meta charset="UTF-8">
</head>
<body>
<main>
    <div class="anadir">
        <div>
            <h1>Añadir lugar</h1>
        </div>
        <div class="anadir2">
            <form action="AnadirLugar.php" method="post">
                <div class="label1">
                    <label>Nombre</label>
                </div>
                <div>
                    <input type="text" name="texto">
                </div>
                <div class="submitAnadir">
                    <input type="submit" value="Añadir" name="envio">
                </div>
                <?php if(isset($correcto) && !$correcto):?>
                    <div style="color: red">Ya existe ese lugar</div>
                <?php endif;?>
                <?php if(isset($correcto) && $correcto):?>
                    <div style="color: #3a3;">Añadido correctamente</div>
                <?php endif;?>
            </form>
        </div>
        <div class="volver">
            <a href="indexAdmin.php" style="background-color: coral ">Volver</a>
        </div>
    </div>
</main>
</body>
</html>