<?php
session_start();

require_once('Clases/claseJesuitas.php');
$objeto = new claseJesuitas();

if(isset($_POST["modificar"]))
{
    $correcto=false;
    if($objeto->modificarLugar($_POST["id"], $_POST["nombre"]))
    {
        $correcto=true;
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
    <div class="borrar">
        <div>
            <h1>Modificar lugares</h1>
        </div>
        <div style="margin-left: 10%">
            <h2>Lugares:</h2>
            <?php
            $lugares=$objeto->consultaLugares();

            foreach ($lugares as $index => $item)
            {
                echo "
                    <form action='' method='post'>
                        <input style='margin-bottom: 0.4rem;' type='text' name='nombre' value='".$item."' placeholder='".$item."' />
                        <input type='hidden' name='id' value='".$index."'/>
                        <input type='submit' value='modificar' name='modificar'/>
                    </form>";
            }

            ?>
        </div>
        <?php if(isset($_POST["modificar"])):?>
            <div style="text-align: center">
                <?php if($correcto):?>
                    <?php echo $_POST["nombre"]?> se ha modificado correctamente
                <?php else:?>
                    Ya hay un lugar con el nombre <?php echo $_POST["nombre"]?>
                <?php endif;?>
            </div>
        <?php endif;?>
        <div class="volver">
            <a href="indexAdmin.php" style="background-color: coral; float: none; margin: 1rem 0 0 10%;">Volver</a>
        </div>
    </div>
</main>
</body>
</html>