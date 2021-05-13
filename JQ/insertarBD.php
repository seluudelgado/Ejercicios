<?php
    //Configuracion de la conexion a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "usuarios";
	$link = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base);

    //consulta para insertar usuarios
    $consulta="INSERT INTO personal (dni, nombre, apellidos, fechaNac, correo, telefono, movil, nExp, nota) 
		VALUES (
			'".$_GET['dni']."',
			'".$_GET['nombre']."', 
			'".$_GET["apellidos"]."', 
			'".$_GET['fechaNac']."',
			'".$_GET['correo']."',
			'".$_GET['telefono']."',
			'".$_GET['movil']."',
			'".$_GET['nExp']."',
			".$_GET["nota"]."
			)";
    if(mysqli_query($link,$consulta))
        echo "bien";
    else
        echo mysqli_error($link);
?>
