<?php
		//Configuración de la conexión a base de datos
	$bd_host = "localhost"; 
	$bd_usuario = "root"; 
	$bd_password = ""; 
	$bd_base = "usuarios";

	$link = mysqli_connect($bd_host, $bd_usuario, $bd_password,$bd_base);  

		//consulta todos los alumnos
	$dni= $_GET["dni"];
	$consulta = "SELECT * FROM personal WHERE dni = '".$dni."'";
    $sql= mysqli_query($link,$consulta);
    $row_cnt = mysqli_num_rows($sql);
    if ($row_cnt==0) 
		echo "error";
    else{
         //muestra los datos consultas
        $row = mysqli_fetch_array($sql);
		 echo 
		 $row['dni']
		 ."-".$row['nombre']
		 ."-".$row['apellidos']
		 ."-".$row['fechaNac']
		 ."-".$row['correo']
		 ."-".$row['telefono']
		 ."-".$row['movil']
		 ."-".$row['nExp']
		 ."-".$row['nota'];
    }
?>
