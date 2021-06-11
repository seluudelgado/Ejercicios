<?php
    require_once('Clases/claseJesuitas.php');
    $objJesuitas = new claseJesuitas();
    if(isset($_POST["inicio"]))
    {
        $sql="SELECT * FROM maquinas WHERE Ip='".$_POST["IP"]."';";
        $objJesuitas->realizarConsultas($sql);
    }
?>
<?php if(isset($_POST["inicio"]) && (!empty($_POST["IP"]) && !empty($_POST["lugar"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] == $_POST["password2"]) && $objJesuitas->comprobarFilas()==0):?>
    <?php

        if($objJesuitas->comprobarFilas()==0)
        {
            //Hacemos un insert into con los valores de la tabla maquinas además de pasar la contraseña por hash para tenerla encriptada
            $sql = "INSERT INTO maquinas (Ip, NombreAlumno, IdLugar, Password, Firma) 
                VALUES ('" . $_POST["IP"] . "','" . $_POST["nombre"] . "', " . $_POST["lugar"] . ", '" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "', '" . $_POST["firma"] . "');";
            $objJesuitas->realizarConsultas($sql);
            if ($objJesuitas)
            {
                header('Location: InicioSesion.php');
            }
        }
    ?>
<?php else:?>
<html>
    <head>
        <link rel="stylesheet" href="Css/disenio.css">
    </head>
    <body>
    <main>
        <div class="registro">
            <div>
                <h1>Registro máquinas</h1>
            </div>
            <div>
                <form method="post" action="#">
                    <div class="datos">
                        <div>
                            <label for="IP">IP address:(*)</label>
                        </div>
                        <div>
                            <input type="text" name="IP" value="<?php if(isset($_POST["inicio"])) echo $_POST["IP"];?>">
                        </div>
                    </div>
                    <?php if(isset($_POST["inicio"]) && $_POST["IP"]==""):?>
                        <!-- comprueba que se haya enviado el formulario y que el campo de la IP esté vacío, si lo está, saca el div de error -->
                        <div style="clear:both; color: red;">Debe rellenar IP</div>
                    <?php endif;?>
                    <?php if(isset($_POST["inicio"]) && !empty($objJesuitas->resultado) && $objJesuitas->comprobarFilas()>0):?>
                        <!-- comprueba que se haya enviado el formulario, que exista $resultado
                         y que la consulta que busca la ip que hemos introducido haya devuelto filas
                         (si ha devuelto filas es porque ya existe esa IP) -->
                        <div style="clear:both; color: red;">IP repetida, use una nueva</div>
                    <?php endif;?>
                    <div class="datos">
                        <div>
                            <label for="password">Contraseña:(*)</label>
                        </div>
                        <div>
                            <input type="password" name="password" value="<?php if(isset($_POST["inicio"])) echo $_POST["password"];?>">
                        </div>
                    </div>
                    <?php if(isset($_POST["inicio"]) && $_POST["password"]==""):?>
                        <div style="clear:both; color: red;">Debe rellenar contraseña</div>
                    <?php endif;?>
                    <div class="datos">
                        <div>
                            <label for="password2">Repite contraseña:</label>
                        </div>
                        <div>
                            <input type="password" name="password2" value="<?php if(isset($_POST["inicio"])) echo $_POST["password2"];?>">
                        </div>
                    </div>
                    <?php if(isset($_POST["inicio"]) && $_POST["password2"]==""):?>
                        <div style="clear:both; color: red;">Debe rellenar segunda contraseña</div>
                    <?php endif;?>
                    <?php if(isset($_POST["inicio"]) && $_POST["password"]!=$_POST["password2"] ):?>
                        <!-- comprueba que se haya enviado el formulario y que los dos campos de contraseña no coincidan,
                        si no coinciden, muestra el div con el error -->
                        <div style="clear:both; color: red;">Las contraseñas deben coincidir</div>
                    <?php endif;?>
                    <div class="datos">
                        <div>
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div>
                            <input type="text" name="nombre" value="<?php if(isset($_POST["inicio"])) echo $_POST["nombre"];?>">
                        </div>
                    </div>
                    <div class="datos">
                        <div>
                            <label for="firma">Firma:</label>
                        </div>
                        <div>
                            <input type="text" name="firma" value="<?php if(isset($_POST["inicio"])) echo $_POST["firma"];?>">
                        </div>
                    </div>
                    <div class="datos">
                        <div>
                            <label for="lugar">Lugar:(*) </label>
                        </div>
                        <div>
                            <!--Hace un select de los lugares que tenemos introducidos en la base de datos para saber que en que ciudad están visitando los jesuitas que se van a registrar-->
                            <select name="lugar" id="">
                                <option value="0" hidden selected>--Seleccione un lugar--</option>
                                <?php
                                $objJesuitas = new claseJesuitas();
                                $lugares=$objJesuitas->consultaLugares();
                                if(!empty($lugares))
                                    foreach ($lugares as $indice => $valor)
                                    {
                                        if(isset($_POST["inicio"]) && $_POST["lugar"]==$indice)
                                            echo '<option selected="selected" value="' . $indice . '">' . $valor . '</option>';
                                        else
                                            echo '<option value="' . $indice . '">' . $valor . '</option>';
                                    }
                                else
                                    echo '<option value="0" disabled>No hay lugares registrados</option>';
                                ?>
                            </select>
                        </div>
                    </div>
                    <?php if(isset($_POST["inicio"]) && $_POST["lugar"]=="0"):?>
                        <div style="clear:both; color: red;">Debe escoger lugar</div>
                    <?php endif;?>

                    <div class="submit">
                        <input type="submit" name="inicio" value="Registrarse">
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>
</html>

<?php endif;?>