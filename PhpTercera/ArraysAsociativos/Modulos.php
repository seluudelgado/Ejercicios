<?php
$modulos = [
    "Empresas" => 3,
    "Cliente" => 7,
    "Servidor" => 8,
    "Diseño" => 7,
    "Despliegue" => 5
];
foreach ($modulos as $item){
    echo key($modulos);
    echo ':'.$item.'<br>';
    next($modulos);
}

?>
