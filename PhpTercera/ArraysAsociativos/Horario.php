
<?php
$horario = array(
    'Horas/Días' => array(' - Lunes',' - Martes',' - Miercoles',' - Jueves',' - Viernes'),
    '8:20 a 9:15' => array(' - Empresa',' - Servidor',' - Empresa',' - Despliegue',' - Cliente'),
    '9:15 a 10:10' => array(' - Servidor',' - Servidor',' - Empresa',' - Cliente',' - Cliente'),
    '10:10 a 11:05' => array(' - Servidor',' - Diseño',' - Tutoria',' - Servidor',' - Diseño'),
    '11:05 a 11:35' => array(' -------------------------RECREO-------------------------'),
    '11:35 a 12:30' => array(' - Cliente',' - Diseño',' - Diseño',' - Cliente',' - Diseño'),
    '12:30 a  13:25' => array(' - Cliente',' - Despliegue',' - Diseño',' - Cliente',' - Servidor'),
    '13:25 a  14:20' => array(' - Despliegue',' - Despliegue',' - Diseño',' - Cliente',' - Servidor'),
    '14:20 a 15:00' => array(' - Despliegue')
);
foreach($horario as $horas => $asignatura){
    echo '<br>';
    echo $horas;
    foreach($asignatura as $nombre){
        echo $nombre;
    }
}
?>
