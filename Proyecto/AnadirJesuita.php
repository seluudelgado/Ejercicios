<?php
    session_start();
    require_once ('Clases/claseJesuitas.php');
    $objeto = new claseJesuitas();

    if(isset($_POST["enviar"]))
    {
        $objeto->anadirJesuita($_POST["nombre"], $_POST["firma"], $_POST["info"]);
    }


?>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <link  rel="stylesheet" href="Css/disenio.css">
</head>
<body>
<main>
    <div class="anadir">
        <div>
            <h1>Añadir Jesuitas</h1>
        </div>
        <div class="anadir2">
            <form action="AnadirJesuita.php" method="post">
            <div style="font-size: 20px">
                <label for="nombre">Introducir Jesuita</label>
            </div>
            <div>
                <input type="text" name="nombre" value="<?php if(isset($_POST["crear"]) && isset($_POST["nombre"])) echo $_POST["nombre"]?>"><br><br>
            </div>
            <div style="font-size: 20px">
                <label for="firma">Introducir firma</label>
            </div>
            <div>
                <input type="text" name="firma" value="<?php if(isset($_POST["crear"]) && isset($_POST["firma"])) echo $_POST["firma"]?>"><br><br>
            </div>

            <label for="filas"> </label>
            <input type="number" name="filas" max="10" style="width: 30%" min="0" value="<?php if(isset($_POST["crear"]) && isset($_POST["filas"])) echo $_POST["filas"]?>"/>

            <input type="submit" name="crear" value="Agregar filas" />
            <?php
            if(isset($_POST["filas"]) && $_POST["filas"]>0)
            {
                echo '<h1></h1><br>';
                for ($i=0; $i<$_POST["filas"]; $i++)
                {
                    echo '<label for="info[]">'.($i+1).': </label> <input type="text" name="info[]" value="';
                    if(isset($_POST["crear"]) && isset($_POST["info"][$i]))
                        echo $_POST["info"][$i];
                    echo '"/><br><br>';
                }
            }
            ?>
            <div class="submitAnadir">
                <br><br><input type="submit" value="Añadir" name="enviar">
            </div>
                <div class="volver">
                    <a href="indexAdmin.php" style="background-color: coral ">Volver</a>
                </div>
            </form>
        </div>
    </div>


</main>
</body>
</html>



