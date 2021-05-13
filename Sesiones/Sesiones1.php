<!--Jose Luis Delgado-->

<?php
	
	session_start();
	$servidor='localhost';
	$usuario='root';
	$password='';
	$basedatos='sesiones';
	
	$mysqli = new mysqli($servidor, $usuario, $password, $basedatos);
	
	$consulta="SELECT * FROM sesion;";
	$resultado = $mysqli->query($consulta);
	
	while($filas = $resultado->fetch_array()){
		if($_POST["usuario"]==$filas["usuario"]){
			$usuario_correcto=$filas["usuario"];
			$contrasena_correcta = $filas["password"];
			$usuario = $_POST["usuario"];
			$contrasena = $_POST["contrasena"];
		}
	}
	
	if(!isset($usuario_correcto)){
		echo'El usuario no existe.';
	}else{
		if ($usuario == $usuario_correcto && $contrasena == $contrasena_correcta) {
			$_SESSION["usuario"] = $usuario;
			$_SESSION["contrasena"] = $contrasena;
			echo 'Sesion iniciada correctamente. <a href="CerrarSesion.php">Cerrar Sesión</a>';
		} else {
			echo "El usuario o la contraseña son incorrectos. Volver a iniciar sesión. <a href='InicioSesion.html'>Iniciar Sesion</a>";
		}
	}

	
?>