<?php
    session_start();
    if(!isset($_SESSION['Sesion_prueba']))
    {
        header('location: InicioSesion.php');
    }

    require_once ('clasephp.php');
    require_once ('claseJesuitas.php');
    $objeto = new claseJesuitas();

    $data = $objeto->lugares();


    echo '<form method="post" action="#">
        <label for="lugar">Elige un lugar</label>
        <select name="lugar">';
        foreach ($data as $valor=>$lugar)
        {
            echo '<option>'.$valor.'</option>';
        }
        echo '</select>
            </form>';

?>