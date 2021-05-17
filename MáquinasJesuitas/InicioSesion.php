<?php
    session_start();
    include_once ('clasephp.php');
    $objeto = new claseJesuitas();
//    $sql = "SELECT Lugar FROM maquinas;";
//    $objeto->realizarConsultas($sql);
////    $data=$objeto->extraerFilas();
////    echo print_r($data);

    if(!isset($_POST["inicio"])
        || empty($_POST["IP"])
        || empty($_POST["password"])
    ){
        echo '<h1>Iniciar sesión</h1>';
        echo '<form method="post" action="#">
            <label for="IP">IP:</label>
            <input type="text" name="IP"><br><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password"><br><br>
            <input type="submit" name="inicio" value="Entrar">
        </form>';
    }else{
        $ip=$_POST['IP'];
        $password=$_POST['password'];
        $resultado=$objeto->comprobar($ip,$password);
        if($resultado){
            $_SESSION['Sesion_prueba'] = 'existe';
            header('location: seleccionlugar.php');
        }else{
            echo 'No se ha iniciado sesión';
        }


//        echo 'h--'.($objeto->comprobar($ip,$password)==1).'-';
//        if($objeto->comprobar($ip,$password)==1)
//        {
//            echo 'Se ha iniciado sesión correctamente';
//        }else{
//            echo 'No se ha iniciado sesión';
//        }
    }
?>
