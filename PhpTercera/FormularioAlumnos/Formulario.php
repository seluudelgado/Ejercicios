<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actividades</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form method="post" action="proceso.php">
        <label>Clase</label>
        <select>
            <option>1DAW</option>
            <option>2DAW</option>
            <option>1SMR</option>
            <option>2SMR</option>
        </select>
        <br><br>
        <label>Alumno</label>
        <input type="text" placeholder="Nombre del alumno..." name="nombre"><br><br>
        <label>Actividades:</label>
        <br>
        <?php //Aqui sustituimos todos los input type checkbox por uno solo, el cual recorremos con foreach
            $actividades= array('50m','600m','triples','fotografia');
                foreach($actividades as $item) {
                    echo'<input type="checkbox" name="actividad[]" value="'.$item.'">';
                    echo '<label>'.$item.'</label><br>';
                }
        ?>
        <label>Torneo de fútbol sala</label>
        <input type="radio" name="futbol"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>