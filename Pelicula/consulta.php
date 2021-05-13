<?php
		//Configuracion de la conexion a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "catalogo";

	$mysqli = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base);
    $sinopsis=mysqli_real_escape_string($mysqli, $_POST["sinop"]);
    $consulta = "INSERT INTO pelicula (codOMDB,titulo,ano,duracion,pais,director,productor,guion,genero,portada,sinopsis,fechaLanzamiento) VALUES ('".$_POST['imdb']."','".$_POST['titulo']."','".$_POST['anyo']."','".$_POST['duracion']."','".$_POST['pais']."','".$_POST['director']."','".$_POST['productor']."','".$_POST['guion']."','".$_POST['genero']."','".$_POST['portada']."','".$_POST['sinop']."','".$_POST['fecha']."')";
    if($sql = mysqli_query($mysqli,$consulta))
        echo 'bien';
    else
        echo mysqli_error($mysqli);
?>
