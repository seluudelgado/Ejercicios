Bienvenido
<?php
     echo $_POST["nombre"]; echo "<br/>"; //El nombre es un tipo text, el cual no nos mostraría ningún error si no escribimos nada.
     if(isset($_POST['actividad'])) //Las actividades son un array que recorremos con el foreach.
     {
        foreach($_POST['actividad'] as $item)
        {
            echo $item."<br>";//se muestran todas las actividades que han sido marcadas con el checkbox
        }
     }
     if(isset($_POST['futbol']))
     {
        echo "Has seleccionado la casilla de futbol sala";//muestra si se ha seleccionado la casilla de futbol
     }else{
        echo "No has seleccionado la casilla de futbol sala";//muestra igualmente si no se ha seleccionado
     }
?>