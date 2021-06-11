<?php
if(!isset($_POST["enviar"])){
    echo '
        <form method="post" action="#" enctype="multipart/form-data">
            <input type="file" name="imagen">
            <input type="submit" name="enviar" value="Subir archivo"/>
        </form>
    ';
}else{
    //Indicamos que si el tipo de archivo no es una imagen, no deje subirlo
    if(empty($_FILES['imagen']['name']) || $_FILES['imagen']['type']!='image/jpeg'){

        echo 'archivo no deseado';
    }
    else
    {
        //Con el uploaded file subimos archivos a la carpeta que estamos indicando (Diseño)
        $dir_subida = 'Diseño/'.basename($_FILES['imagen']['name']);
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $dir_subida)) {
            echo "El archivo ".  basename( $_FILES['imagen']['name']). " ha sido subido";
        } else{
            echo "El archivo no se ha subido correctamente";
        }
    }
    //El scandir muestra un array con todos los archivos que subimos, en este caso imágenes
    $directorio = 'Imagenes/';
    $entrada = scandir($directorio);


        //Al subir un archivo, muestra este mismo y los que se han introducido previamente
        echo '<ul>';
        foreach ($entrada as $index){
            if($index!='.' && $index!='..'){
                echo '<li>'.$index.'</li>';
            }

        }
        echo '</ul>';

}
?>
