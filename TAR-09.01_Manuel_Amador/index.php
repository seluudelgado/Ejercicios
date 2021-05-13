<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TAR-09.01 Cajas Flotantes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
</header>
<div id="nav1">
    <nav>
        <ul>
            <li>Futbol</li>
            <li>Baloncesto</li>
            <li>Tenis</li>
            <?php
            session_start();
            require_once 'MetodosManuelAmador.php';
            $objconexion =new clasesql();
            if (isset($_SESSION["usuario"])){
                echo '<li>Mi Equipo</li>
                      <li><a href="CerrarSesion.php">Cerrar Sesion</a></li>';
            }
            else{
                echo '  <li><a href="iniciodesesion.php">Inicio Sesion</a></li>';
            }
            ?>

        </ul>
    </nav>
</div>

<div id="principal">
    <div id="columna">
        <nav >
            <ul>
                <li >Liga Santander</li>
                <li>Liga SmartBank</li>
                <li>Premier League</li>
                <li>Bundesliga</li>
                <li>Serie A</li>
                <?php
                if (isset($_SESSION["usuario"])){
                    echo '<li>Eridivise</li>
                           <li>2º DivisionB</li>';

                }

                ?>
            </ul>
        </nav>
    </div>
    <div id="contenedor">
        <div>asjkdffdasgdfd</div>
        <div>asdkhgdkslhgdsklghalkñhg</div>
    </div>
</div>
<div id="nav3">
    <nav>
        <ul>
            <li>
				<a href="">Blog</a>
			</li>
            <li>
				<a href="">Información</a>
			</li>
            <li>
				<a href="">Contacto</a>
			</li>
			<?php
			if (isset($_SESSION["usuario"])){
                    echo '<li>Suscribete</li>';
             }
             ?>
        </ul>
    </nav>
</div>



</body>
</html>