<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ranking visitas</title>
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="refresh" content="10">
    </head>
    <body>
    <div id="general">
        <img src="imagenes/logotipo.png">
        <?php
            require_once 'clasephp.php';
            $objeto=new clasephp();
            /*Consulta para mostrar los 5 lugares con mas visitas*/
            $sql="select v.Ip,l.Nombre, count(v.Ip) contador from Visitas v INNER JOIN Lugares l ON l.Ip=v.Ip group by v.Ip having contador  ORDER by contador desc LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<h1>Ranking 5 Lugares Mas Visitados</h1>';
            if ($objeto->comprobar()>0){
                while($fila=$objeto->extraerFilas())
                {
                    echo $fila["Nombre"].' tiene '.$fila["contador"].' visitas<br>';
                }
            }
            else{
                echo' No hay visitas a ningun lugar';
            }
            /*Consulta para mostrar los 5 jesuitas con mas visitas*/
            $sql="SELECT v.IdJesuita,j.Nombre, COUNT(*) AS visitas FROM visitas v INNER JOIN jesuitas j ON v.IdJesuita=j.IdJesuita GROUP BY IdJesuita ORDER BY COUNT(*) DESC LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<h1>Ranking 5 Jesuitas Mas Viajeros</h1>';
            if ($objeto->comprobar()>0){
                while($fila=$objeto->extraerFilas())
                {
                    echo $fila["Nombre"].' ha realizado '.$fila["visitas"].' visitas<br>';
                }
            }
            else{
                echo' No hay jesuitas viajando';
            }
            /*Consulta para mostrar los 5 visitas*/
            $sql="SELECT j.Nombre,l.Nombre AS Lugar FROM visitas v INNER JOIN jesuitas j ON v.IdJesuita=j.IdJesuita INNER JOIN lugares l ON v.Ip=l.Ip ORDER BY FechaHora DESC LIMIT 5";
            $objeto->realizarConsultas($sql);
            echo '<h1>Ultimas 5 Visitas</h1>';
            if ($objeto->comprobar()>0){
                while($fila=$objeto->extraerFilas())
                {
                    echo $fila["Nombre"].' ha visitado '.$fila["Lugar"].'<br>';
                }
            }
            else{
                echo' No hay ultimas visitas';
            }
            header("Refresh:10;");
        ?>
    </div>
    </body>
</html>
