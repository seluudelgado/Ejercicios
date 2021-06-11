<?php
    session_start();

    if(!isset($_SESSION["ipUsuario"]))
    {
        header("Location: InicioSesion.php");
    }
    require_once('Clases/claseJesuitas.php');

    $objeto = new claseJesuitas();
    $data =$objeto->consultaVisitaLugares($_SESSION["idLugar"]);

    if(!isset($_COOKIE['lugares']))
    {
        $m = array('primero'=>'','segundo'=>'','tercero'=>'');
        setcookie('lugares',json_encode($m),0); //Codifica el array en json para poder valor a la cookie, ya que una cookie no te permite meter parámetros array
    }
    else
    {
        if(isset($_GET['Lugar']))
        {

            if($nombre = $objeto->saberNombreLugar($_GET["Lugar"]))
            {
                $m = json_decode($_COOKIE['lugares'],true); //Decodifica el json para poder convertirlo en array

                if($m['primero']=='')
                {
                    $m['primero'] = $nombre;
                }

                $m['primero'] = $m['segundo'];
                $m['segundo'] = $m['tercero'];
                $m['tercero'] = $nombre;

                setcookie('lugares',json_encode($m),0);
            }

        }
    }


?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lugares</title>
        <link rel="stylesheet" href="Css/disenio.css">
    </head>
    <body>
        <main>
            <div class="lugares">
                <div>
                    <h1>Visitas</h1>
                </div>
                <div id="visita">
                    <div>
                        <div>
                            <h3>Elige un lugar</h3>
                        </div>
                        <div>
                            <ul>
                                <?php foreach ($data as $id=>$nombre): ?>
                                    <li><a href="SeleccionLugar.php?Lugar=<?php echo $id?>"><?php echo $nombre?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h3>Ultimas visitas realizadas</h3>
                        </div>
                        <?php if(isset($_COOKIE["lugares"])): ?>
                        <div>
                            <ul>
                                <?php $m = json_decode($_COOKIE["lugares"],true); ?>
                                <?php foreach ($m as $lugar):?>
                                <li><?php echo $lugar ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if(isset($_GET["Lugar"])): ?>
                        <?php if($nombre = $objeto->saberNombreLugar($_GET["Lugar"])):?>
                            <?php if(!$objeto->comprobarVisitaLugar($_SESSION["idUsuario"],$_GET["Lugar"])): ?>
                                <div>
                                    <h2>Has visitado <?php echo $nombre ?></h2>
                                </div>
                            <?php else:?>
                                    <div>
                                        <h2>YA Has visitado <?php echo $nombre ?></h2>
                                    </div>
                            <?php endif;?>
                           <?php $objeto->anadirVisitas($_SESSION["idUsuario"],$_GET["Lugar"]); ?>
                        <?php endif;?>
                    <?php endif;?>
                    <div>
                        <a href="cerrarSesion.php"><button>Cerrar Sesión</button></a>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>


